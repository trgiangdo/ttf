<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Listening extends Model
{
    protected $fillable = [
        'audio_url', 'exam_id', 'Part',
    ];


	public function exam()
	{
	    return $this->belongsTo('App\Exam');
	}

    public function example()
    {
        return $this->hasOne('App\Exam\Example');
    }

    public function part1()
    {
        return $this->hasMany('App\Exam\Part1');
    }

    public function part2()
    {
        return $this->hasMany('App\Exam\Part2');
    }

    public function part3()
    {
        return $this->hasMany('App\Exam\Part3');
    }

    public function part4()
    {
        return $this->hasMany('App\Exam\Part4');
    }
}
