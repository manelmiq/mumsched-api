<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockPreferences extends Model
{
    protected $table = 'faculty_blocks_preferences';
    protected $fillable = ['id_faculty', 'id_block'];
}
