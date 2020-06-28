<?php

namespace App\Http\Controllers;

use App\FindYourHome\Interfaces\FrontendRepositoryInterface;
use App\FindYourHome\Gateways\FrontendGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function __construct(FrontendRepositoryInterface $fR, FrontendGateway $fG){
        $this->fR = $fR;
        $this->fG = $fG;
    }

    public function index(){
        $adverts = $this->fR->getAdvertsForMainPage();
        return view('frontend.index', ['adverts' => $adverts]);
    }

    public function search(Request $request){
        if($city = $this->fG->getSearchedResults($request)){
            foreach($city->adverts as $advert){
                $created = $this->fG->countDate($advert->created_at);
            }
            return view('frontend.search',['city' => $city, 'created' => $created]);
        }else{
            if(!$request->ajax());
            return redirect('/')->with('noadverts', 'Brak ofert spełniających wymagane kryteria');
        }

    }

    public function advert($id, $name){
        $advert = $this->fR->getSingleAdvert($id);
        $city = $advert->city->id;
        $costs = $this->fR->getAdverts($city);

        $created = $this->fG->countDate($advert->created_at);
        $updated = $this->fG->countDate($advert->updated_at);
        if(Auth::user() != null) {
            $observed = $this->fR->isObserved($id);
            return view('frontend.advert', ['advert' => $advert, 'created' => $created, 'updated' => $updated, 'observed' => $observed, 'costs' => $costs]);
        } else {
            return view('frontend.advert', ['advert' => $advert, 'created' => $created, 'updated' => $updated, 'costs' => $costs]);
        }
    }

    public function searchAdverts(Request $request){
        $results = $this->fG->searchAdverts($request);
        return response()->json($results);
    }

    public function userAdverts($id){
        $adverts = $this->fR->getUserAdverts($id);
        $user = $this->fR->getUser($id);
        $created = '';
        foreach($adverts as $advert){
            $created = $this->fG->countDate($advert->created_at);
        }
        return view('frontend.userAdverts', ['adverts' => $adverts, 'created' => $created, 'user' => $user]);
    }

    public function sendMessage(Request $request){
        $this->fG->sendMessage($request);
        return redirect(url()->previous().'#message');
    }

    public function getArticles() {
        return view('frontend.articles');
    }
}
