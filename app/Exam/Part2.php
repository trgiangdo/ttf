<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Part2 extends Model
{
	protected $fillable = [
        'listening_id', 'question_type_id', 'answer',
    ];


    public function listening()
	{
	    return $this->belongsTo('App\Exam\Listening');
	}

	public function questionType()
	{
	    return $this->belongsTo('App\Exam\QuestionType');
	}
}
