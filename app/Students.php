<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable = ['firstName', 'lastName', 'email','id_entry', 'password', 'nacionality', 'track_type',
        'registration_number', 'starting_course'];
}
