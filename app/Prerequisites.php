<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prerequisites extends Model
{
    protected $fillable = ['id_course', 'course_name', 'course_code'];
}
