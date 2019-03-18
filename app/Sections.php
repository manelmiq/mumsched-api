<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{

    protected $fillable = ['id_course', 'id_block', 'id_faculty'];
//
//    public function block()
//    {
//        return $this->belongsTo('App\Block');
//    }
//
//
//    public function course()
//    {
//        return $this->belongsTo('App\Course');
//    }
//
//
//    public function faculty()
//    {
//        return $this->belongsTo('App\Faculties');
//    }
}
