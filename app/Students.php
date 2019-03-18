<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable = ['id', 'firstName', 'lastName', 'email','id_entry', 'password', 'registration_number'];
}
