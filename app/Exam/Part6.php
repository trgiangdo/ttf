<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Part6 extends Model
{
	protected $fillable = [
        'reading_id', 'question_type_id', 'choice_A', 'choice_B', 'choice_C', 'choice_D', 'answer',
    ];


    public function reading()
	{
	    return $this->belongsTo('App\Exam\Reading');
	}

	public function questionType()
	{
	    return $this->belongsTo('App\Exam\QuestionType');
	}
}
