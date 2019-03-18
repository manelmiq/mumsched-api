<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    protected $fillable = ['firstName', 'lastName' , 'email', 'password'];
}
