<?php

namespace App\FindYourHome\Repositories;

use App\FindYourHome\Interfaces\FrontendRepositoryInterface;
use App\{Advert, City, Cost, Dimension, Photo, User, Message};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendRepository implements FrontendRepositoryInterface{

    public function getAdvertsForMainPage(){
        return Advert::with(['city', 'costs', 'dimensions', 'photos'])->latest()->paginate(8);
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

    public function getAdverts($city) {
        $adverts = Advert::with('costs', 'city')->where('city_id', $city)->get();
        return $adverts;
    }

}
