<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $fillable = ['firstName', 'lastName', 'name', 'email', 'password'];
}
