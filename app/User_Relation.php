<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Relation extends Model
{
    protected $table = 'users_relations';   
    protected $fillable = ['gebruiker', 'vriend'];
    protected $fillable1 = ['gebruiker', 'gebruiker'];
}



