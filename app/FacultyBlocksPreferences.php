<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyBlocksPreferences extends Model
{
    protected $table = 'faculty_blocks_preferences';
    protected $fillable = ['id_faculty', 'id_block'];
}
