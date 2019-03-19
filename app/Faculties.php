<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    protected $fillable = ['firstName', 'lastName' , 'email', 'password'];


    public function coursePreferences()
    {
        return $this->belongsToMany(
            'App\Courses',
            'faculty_courses_preferences',
            'id_faculty',
            'id_course');
    }

}
