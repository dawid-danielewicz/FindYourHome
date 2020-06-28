<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    public function city(){
        return $this->belongsTo('App\City');
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function costs(){
        return $this->hasOne('App\Cost');
    }

    public function dimensions(){
        return $this->hasOne('App\Dimension');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function address(){
        return $this->hasOne('App\Address');
    }

    public function fixtures(){
        return $this->hasOne('App\Fixture');
    }

    public function conditions(){
        return $this->hasOne('App\Condition');
    }

    public function rooms(){
        return $this->hasOne('App\Room');
    }

    public function heating(){
        return $this->hasOne('App\Heating');
    }

    public function observed(){
        return $this->belongsToMany('App\User');
    }
}
