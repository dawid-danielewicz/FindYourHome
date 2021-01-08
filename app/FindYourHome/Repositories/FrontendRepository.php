<?php

namespace App\FindYourHome\Repositories;

use App\FindYourHome\Interfaces\FrontendRepositoryInterface;
use App\{Advert, City, Cost, Dimension, Photo, User, Message};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendRepository implements FrontendRepositoryInterface{

    public function getAdvertsForMainPage(){
        return Advert::with(['city', 'costs', 'dimensions', 'photos'])->latest()->paginate(12);
    }

    public function getSingleAdvert($id){
        return Advert::findOrFail($id);
    }

    public function getSearchedAdverts(string $term){
        return City::where('name', 'LIKE', $term.'%')->get();
    }

    public function getSearchedResults(string $city){
        return City::with(['adverts', 'adverts.photos', 'adverts.costs', 'adverts.dimensions'])->where('name', $city)->first() ?? false;
    }

    public function getUserAdverts($id){
        return Advert::with(['city', 'costs', 'dimensions', 'photos'])->where('user_id', $id)->get();
    }

    public function getUser($id){
        return User::where('id', $id)->first();
    }

    public function saveMessage($request){
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->telephone = $request->input('telephone');
        $message->content = $request->input('content');
        $message->user_id = $request->input('user_id');

        Session::flash('messagesent', 'Wiadomość została pomyślnie wysłana do właściciela.');
        return $message->save();
    }

    public function isObserved($id) {
        $user = Auth::user()->id;
        $advert = User::find($user)->observeAdvert()->find($id);
        return $advert;
    }

    public function getAdverts($city, $form, $type) {
        $adverts = Advert::where([['city_id', $city], ['form', $form], ['type', $type]])->pluck('id')->toArray();
        if($type == 'wynajem') {
            $costs = Cost::whereIn('advert_id', $adverts)->avg('rent');
        }
        else {
            $costs = Cost::whereIn('advert_id', $adverts)->avg('price');
        }   
        return round($costs);
    }

    public function countDiff($id, $average, $form) {
        $advert = Advert::findOrFail($id);
        if($form == 'sprzedaż') {
            if($advert->costs->price == 0)
                $result = 0;
            else
                $result = round(($advert->costs->price - $average) / ($advert->costs->price/10)) * 10;
        } else {
            if($advert->costs->rent == 0)
                $result = 0;
            else
                $result = round(($advert->costs->rent - $average) / ($advert->costs->rent/10)) * 10;
        }
        if($result < 0)
            return $result - (2 * $result);
        else
            return $result;
    }

}
