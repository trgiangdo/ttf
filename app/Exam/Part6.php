<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Part6 extends Model
{
	protected $fillable = [
        'reading_id', 'question_type_id', 'choiceA', 'choiceB', 'choiceC', 'choiceD', 'answer',
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
