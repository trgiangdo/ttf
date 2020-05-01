<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
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

    public function part5()
    {
        return $this->hasOne('App\Exam\Part5');
    }

    public function part6()
    {
        return $this->hasMany('App\Exam\Part6');
    }

    public function part7()
    {
        return $this->hasMany('App\Exam\Part7');
    }
}
