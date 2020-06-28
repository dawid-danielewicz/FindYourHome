<?php

namespace App\FindYourHome\Repositories;

use App\FindYourHome\Interfaces\BackendRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\{Advert, City, Cost, Dimension, Photo, User, Message};

class BackendRepository implements BackendRepositoryInterface{

    public function getUserAdverts(){
        return Advert::with(['city', 'costs'])->where('user_id', Auth::user()->id)->get();
    }

    public function getUserMessages(){
        return Message::where('user_id', Auth::user()->id)->get();
    }

    public function getCities(){
        return City::all()->sortBy('id');
    }

    public function getUsers(){
        return User::all()->sortBy('id');
    }

    public function getUser(){
        return User::where('id', Auth::user()->id)->first();
    }

    public function addCity($request){
        $city = new City;
        $city->name = $request->input('name');

        Session::flash('cityadded', 'City has been succesfully added.');

        return $city->save();
    }

    public function getSearchedAdverts(string $term){
        return City::where('name', 'LIKE', $term.'%')->get();
    }

    public function saveUser($request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->telephone = $request->input('telephone');
        $user->save();

        return $user;
    }

    public function getPhoto($id){
        return Photo::find($id);
    }

    public function updateUserPhoto($user, $photo){
        return $user->photos()->save($photo);
    }

    public function createUserPhoto($user, $path){
        $photo = new Photo;
        $photo->path = $path;
        return $user->photos()->save($photo);
    }

    public function deletePhoto(Photo $photo){
        $path = $photo->storagepath;
        $photo->delete();
        return $path;
    }

    public function deleteCity($id){
        $city = City::find($id);
        $city->delete();
        return $city;
    }

    public function getCity($id){
       return City::find($id);
    }

    public function updateCity($request, $id){
        Session::flash('cityupdated', 'City has been succesfully updated.');
        return City::where('id', $id)->update([
            'name' => $request->input('name')
        ]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return $user;
    }

    public function deleteMessage($id){
        $message = Message::find($id);
        $message->delete();
        return $message;
    }

    public function observe($id){
        $user = User::find(Auth::user()->id);
        $advert = $id;
        $user->observeAdvert()->attach($advert);
        return $user;
    }

    public function unObserve($id) {
        $user = User::find(Auth::user()->id);
        $advert = $id;
        $user->observeAdvert()->detach($advert);
        return $user;
    }

    public function getObserved() {
        $user = Auth::user()->id;
        $adverts = User::find($user)->observeAdvert()->get();
        return $adverts;
    }


}
