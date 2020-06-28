<?php

namespace App\FindYourHome\Gateways;

use App\FindYourHome\Interfaces\FrontendRepositoryInterface;
use Illuminate\Support\Facades\Validator;



class FrontendGateway {

    use \Illuminate\Foundation\Validation\ValidatesRequests;

    public function __construct(FrontendRepositoryInterface $fR)
    {
        $this->fR = $fR;
    }

    public function searchadverts($request){
        $term = $request->input('term');
        $result = [];
        $queries = $this->fR->getSearchedAdverts($term);

        foreach($queries as $query){
            $result[] = ['id' => $query->id, 'value' => $query->name];
        }

        return $result;
    }

    public function getSearchedResults($request){

        $request->flash();

        if($request->input('city') != null){
            $result = $this->fR->getSearchedResults($request->input('city'));

            if($result){

                foreach($result->adverts as $k => $advert) {
                        if ($request->input('type') != $advert->type) {
                            $result->adverts->forget($k);
                        }

                        if($request->input('form') != $advert->form){
                            $result->adverts->forget($k);
                        }

                        if($request->input('price')){
                            if($request->input('price') < $advert->costs->price){
                                $result->adverts->forget($k);
                            }
                        }elseif ($request->input('rent')){
                            if($request->input('rent') < $advert->costs->rent){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('area')){
                            if($request->input('area') < $advert->dimensions->area){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('rooms')){
                            if($request->input('rooms') != $advert->rooms->rooms){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('floor')){
                            if($request->input('floor') != $advert->fixtures->floor){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('build_year')){
                            if($request->input('build_year') > $advert->conditions->build_year){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('place')){
                            if($request->input('place') != $advert->fixtures->place){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('energy')){
                            if($request->input('energy') != $advert->heating->energy){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('aircondition')){
                            if($request->input('aircodition') == $advert->fixtures->aircondition){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('cellar')){
                            if($request->input('cellar') != $advert->fixtures->cellar){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('garden')){
                            if($request->input('garden') != $advert->fixtures->garden){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('balcony')){
                            if($request->input('balcony') != $advert->rooms->balcony){
                                $result->adverts->forget($k);
                            }
                        }

                        if($request->input('terrace')){
                            if($request->input('terrace') != $advert->rooms->terrace){
                                $result->adverts->forget($k);
                            }
                        }

                    }

                if(count($result->adverts) > 0)
                    return $result;
                else
                    false;
            }
        }

        return false;
    }

    function countDate($date)
    {
        $seconds_ago = (time() - strtotime($date));
        $result = '';
        if ($seconds_ago >= 31536000) {
            $result = intval($seconds_ago / 31536000) . " lat temu";
        } elseif ($seconds_ago >= 2419200) {
            $result = intval($seconds_ago / 2419200) . " miesięcy temu";
        } elseif ($seconds_ago >= 86400) {
            $result = intval($seconds_ago / 86400) . " dni temu";
        } elseif ($seconds_ago >= 3600) {
            $result = intval($seconds_ago / 3600) . " godzin temu";
        } elseif ($seconds_ago >= 60) {
            $result = intval($seconds_ago / 60) . " minut temu";
        } else {
            $result = "mniej niż minutę temu";
        }
        return $result;
    }

    public function sendMessage($request){
        $validator = Validator::make($request->all(), [
            'name' => "required|string",
            'email' => "required|email",
            'telephone' => "required|numeric",
            'content' => "required|string"
        ]);

        if($validator->fails()){
            return redirect(url()->previous().'#message')->withErrors($validator)->withInput();
        }
        else
        return $this->fR->saveMessage($request);

    }

}
