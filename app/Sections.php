<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{

    protected $fillable = ['id_course', 'id_faculty','id_block','seats_available'];

    public function block()
    {
        return $this->hasOne('App\Block', 'id_block');
    }


    public function course()
    {
        return $this->hasOne('App\Course', 'id_course');
    }


    public function faculty()
    {
        return $this->hasOne('App\Faculties', 'id_faculty' );
    }
}
