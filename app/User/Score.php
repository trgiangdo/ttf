<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
