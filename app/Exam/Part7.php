<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Part7 extends Model
{
	protected $fillable = [
        'reading_id', 'question_type_id', 'question', 'choiceA', 'choiceB', 'choiceC', 'choiceD', 'answer',
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
