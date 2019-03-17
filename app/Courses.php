<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $fillable = ['code', 'name', 'description', 'course_level', 'on_campus'];
}
