<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entries extends Model
{
    protected $fillable = ['date', 'description'];

    public function students()
    {
        return $this->hasMany('App\Students', 'id_entry');
    }
}
