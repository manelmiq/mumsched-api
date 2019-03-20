<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{

    protected $fillable = ['id_course', 'id_faculty','id_block','capacity'];

    public function block()
    {
        return $this->belongsTo('App\Blocks', 'id_block');
    }


    public function course()
    {
        return $this->belongsTo('App\Courses', 'id_course');
    }


    public function faculty()
    {
        return $this->belongsTo('App\Faculties', 'id_faculty' );
    }
}
