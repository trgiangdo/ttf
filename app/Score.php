<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Score extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'listening_correct_answers', 'reading_correct_answers', 'final_score',
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var $arrayName = array('' => , );
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
