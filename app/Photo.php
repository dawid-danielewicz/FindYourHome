<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;

    public function photoable(){
        return $this->morphTo();
    }

    public function getPathAttribute($value){
        return asset("storage/{$value}");
    }

    public function getStoragepathAttribute(){
        return $this->original['path'];
    }
}
