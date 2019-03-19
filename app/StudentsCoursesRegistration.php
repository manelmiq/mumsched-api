<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsCoursesRegistration extends Model
{

    protected $table = 'students_courses_registrations';
    protected $fillable = ['id_section', 'id_student'];

    public function section()
    {
        return $this->belongsTo('App\Sections', 'id_section');
    }

    public function student()
    {
        return $this->belongsTo('App\Students', 'id_student');
    }


}
