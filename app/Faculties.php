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

    public function blockPreferences()
    {
        return $this->belongsToMany(
            'App\Blocks',
            'faculty_blocks_preferences',
            'id_faculty',
            'id_block');
    }

    public function coursesScheduled()
    {
        return $this->belongsToMany(
            'App\Courses',
            'sections',
            'id_faculty',
            'id_course');
    }

    public function blocksScheduled()
    {
        return $this->belongsToMany(
            'App\Blocks',
            'sections',
            'id_faculty',
            'id_block');
    }

}
