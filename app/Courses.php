<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['code', 'name', 'description', 'course_level', 'on_campus'];

    public function prerequisites()
    {
        return $this->hasMany('App\Prerequisites', 'id_course');
    }

    public function facultyPreferences()
    {
        return $this->belongsToMany(
            'App\Faculties',
            'Faculty_Courses_Preferences',
            'id_course',
            'id_faculty');
    }
}
