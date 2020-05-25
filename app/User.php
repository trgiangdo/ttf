<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'sex', 'DOB', 'password', 'address', 'phone',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'scores')
                    ->using('App\Score')
                    ->as('scores');
    }

    public function skills()
    {
        return $this->hasOne('App\User\Skill');
    }

    public function isAdmin()
    {
        return $this->role == 2;
    }
}