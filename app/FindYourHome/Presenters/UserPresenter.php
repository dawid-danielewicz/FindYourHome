<?php

namespace App\FindYourHome\Presenters;

trait UserPresenter{

    public function getFullNameAttribute(){
        return $this->name. ' ' .$this->surname;
    }
}
