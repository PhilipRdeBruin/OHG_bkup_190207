<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vriend extends Model
{
    protected $fillable = [
        'vr_voornaam',
        'vr_tussenvoegsel',
        'vr_achternaam',
        
    ];

    protected $table = 'vrienden';


}
