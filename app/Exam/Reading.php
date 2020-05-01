<?php

namespace App\Exam;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = [
        'paragraph', 'exam_id', 'Part',
    ];


    public function exam()
    {
        return $this->belongsTo('App\Exam');
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
