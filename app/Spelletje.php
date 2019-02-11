<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spelletje extends Model
{

    public function actieveSpelletjes() {
        return $this->hasMany('App\Actievespelletje', 'spel_id');
    }

}
