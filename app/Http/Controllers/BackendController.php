<?php

namespace App\Http\Controllers;

use App\FindYourHome\Gateways\BackendGateway;
use App\FindYourHome\Interfaces\BackendRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BackendController extends Controller
{

    public function __construct(BackendRepositoryInterface $bR, BackendGateway $bG){
        $this->bR = $bR;
        $this->bG = $bG;
    }
    public function index(){
        $adverts = $this->bR->getUserAdverts();
        return view('backend.index', ['adverts' => $adverts]);
    }

    public function addAdvert(){
        return view('backend.addAdvert');
    }

    public function saveAdvert(Request $request){
        $this->bG->addAdvert($request);
        return redirect()->back();
    }

    public function messages(){
        $messages = $this->bR->getUserMessages();
        return view('backend.messages',['messages' => $messages]);
    }

    public function cities(){
        $cities = $this->bR->getCities();
        return view('backend.cities', ['cities' => $cities]);
    }

    public function addCity(){
        return view('backend.addCity');
    }

    public function editCity($id){
        $city = $this->bR->getCity($id);
        return view('backend.editCity', ['city' => $city]);
    }

    public function saveCity(Request $request){
        $this->bG->addCity($request);

        return redirect()->back();
    }

    public function deleteCity($id){
        $city = $this->bR->deleteCity($id);
        return redirect()->back();
    }

    public function updateCity(Request $request, $id){
        $city = $this->bG->updateCity($request, $id);
        return redirect()->back();
    }

    public function users(){
        $users = $this->bR->getUsers();
        return view('backend.users', ['users' => $users]);
    }

    public function user(Request $request){
        if($request->isMethod('POST')){
            $user = $this->bG->saveUser($request);
            if($request->hasFile('photo')){
                $path = $request->file('photo')->store('users', 'public');
                if(count($user->photos) != 0){
                    $photo = $this->bR->getPhoto($user->photos->first()->id);
                    Storage::disk('public')->delete($photo->storagepath);
                    $photo->path = $path;
                    $this->bR->updateUserPhoto($user, $photo);

                }else{
                    $this->bR->createUserPhoto($user, $path);
                }
            }
            return redirect()->back();
        }
        $user = $this->bR->getUser();
        return view('backend.user', ['user' => $user]);
    }

    public function searchAdverts(Request $request){
        $results = $this->bG->searchAdverts($request);
        return response()->json($results);
    }

    public function deletePhoto($id){
        $photo = $this->bR->getPhoto($id);
        $this->authorize('checkOwner', $photo);
        $path = $this->bR->deletePhoto($photo);
        Storage::disk('public')->delete($path);
        return redirect()->back();
    }

    public function deleteUser($id){
        $user = $this->bR->deleteUser($id);
        return redirect()->back();
    }

    public function deleteMessage($id)
    {
        $message = $this->bR->deleteMessage($id);
        $this->authorize('checkOwner', $message);
        return redirect()->back();
    }

    public function observe($id){
        $observe = $this->bR->observe($id);
        return redirect()->back();
    }

    public function unObserve($id){
        $unObserve = $this->bR->unObserve($id);
        return redirect()->back();
    }

    public function observables(){
        $adverts = $this->bR->getObserved();
        return view('backend.observe', ['adverts' => $adverts]);
    }

}
