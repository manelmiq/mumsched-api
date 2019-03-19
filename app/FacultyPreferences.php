<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyPreferences extends Model
{
    protected $table = 'faculty_courses_preferences';
    protected $fillable = ['id_faculty', 'id_course'];
}
