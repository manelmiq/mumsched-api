<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entries extends Model
{
    protected $fillable = ['date', 'description'];
}
