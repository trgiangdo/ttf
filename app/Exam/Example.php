<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    public function listening()
    {
    	return $this->belongsTo('App\Exam\Listening');
    }
}
