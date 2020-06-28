<?php

namespace App\FindYourHome\Gateways;

use App\FindYourHome\Interfaces\BackendRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class BackendGateway {

    use \Illuminate\Foundation\Validation\ValidatesRequests;

    public function __construct(BackendRepositoryInterface $bR)
    {
        $this->bR = $bR;
    }

    public function addCity($request){
        $validator = Validator::make($request->all(), [
            'name' => "required|alpha"
        ]);

        if($validator->fails()){
            return redirect()->route('addCity')->withErrors($validator)->withInput();
        }
        else
        return $this->bR->addCity($request);
    }

    public function addAdvert($request){
        $validator = Validator::make($request->all(), [
            'type' => "required",
            'form' => "required",
            'title' => "required|string",
            'description' => "required|string",
            'area' => "required|numeric",
            'city' => "required|string",
            'zip_code' => "required",
            'street' => "required|string",
            'number' => "required|numeric",
            'avaliable' => "date",
            'price' => "numeric",
            'rent' => "numeric",
            'rent_per_m' => "numeric",
            'heating_costs' => "numeric",
            'year' => "numeric",
            'fixed' => "numeric"
        ]);

        if($request->hasFile()){

        }
    }

    public function searchAdverts($request){
        $term = $request->input('term');
        $result = [];
        $queries = $this->bR->getSearchedAdverts($term);

        foreach($queries as $query){
            $result[] = ['id' => $query->id, 'value' => $query->name];
        }

        return $result;
    }

    public function saveUser($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|numeric'
        ]);


        if($request->hasFile('picture')){
            $this->validate($request, [
               'picture' => 'image|max:200'
            ]);
        }

        return $this->bR->saveUser($request);
    }

    public function updateCity($request, $id){
        $validator = Validator::make($request->all(), [
           'name' => "required|string"
        ]);

        if($validator->fails()){
            return redirect()->route('editCity',['id'=> $id])->withErrors($validator)->withInput();
        }else{
            return $this->bR->updateCity($request, $id);
        }
    }


}
