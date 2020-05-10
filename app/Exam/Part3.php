<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Part3 extends Model
{
	protected $fillable = [
        'listening_id', 'question_type_id', 'question', 'choice_A', 'choice_B', 'choice_C', 'choice_D', 'answer',
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
