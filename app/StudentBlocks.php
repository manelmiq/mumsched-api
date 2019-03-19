<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentBlocks extends Model
{
    protected $table = 'student_blocks';
    protected $fillable = ['id_student', 'id_block'];

    public function students()
    {
        return $this->hasMany('App\Students', 'id_student');
    }

}
