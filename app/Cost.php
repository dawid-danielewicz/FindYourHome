<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    public function advert() {
        return $this->belongsTo('App\Advert');
    }

}
