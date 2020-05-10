<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $fillable = [
        'example', 'image_url',
    ];

    public function listening()
    {
    	return $this->belongsTo('App\Exam\Listening');
    }
}
