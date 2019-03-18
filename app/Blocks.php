<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocks extends Model
{
    protected $fillable = ['start_date', 'end_date', 'description', 'on_campus'];
}
