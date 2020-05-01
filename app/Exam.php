<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
	protected $fillable = [
        'name', 'type',
    ];


    public function listenings()
    {
        return $this->hasMany('App\Exam\Listening');
    }

    public function readings()
    {
        return $this->hasMany('App\Exam\Reading');
    }
}
