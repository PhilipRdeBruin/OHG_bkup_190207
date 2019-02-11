<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actievespelletje extends Model
{

    public function hostGebruiker() {
        return $this->belongsTo('App\User', 'host');
    }
    
    public function users() {
        return $this->belongsToMany('App\User', 'actievespelletjes_users', 'act_spel_id', 'speler_id')->withPivot('id');
    }

    public function spelletje() {
        return $this->belongsTo('App\Spelletje', 'spel_id');
    }

}
