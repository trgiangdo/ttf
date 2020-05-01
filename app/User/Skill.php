<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
