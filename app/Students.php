<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable = ['firstName', 'lastName', 'email','id_entry', 'password', 'nacionality', 'track_type',
        'registration_number', 'starting_course'];

    public function sectionsScheduled()
    {
        return $this->belongsToMany(
            'App\Sections',
            'students_courses_registrations',
            'id_student',
            'id_section');
    }
}
