<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocks extends Model
{
    protected $fillable = ['start_date', 'end_date', 'description', 'on_campus'];

    public function facultyPreferences()
    {
        return $this->belongsToMany(
            'App\Faculties',
            'faculty_blocks_preferences',
            'id_block',
            'id_faculty');
    }

}
