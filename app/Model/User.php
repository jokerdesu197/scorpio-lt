<?php

namespace App\Modal;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
\Carbon\Carbon::setToStringFormat('d-m-Y');

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login_id', 'email', 'birth', 'sex', 'password', 'login_date', 'status','del_flg'
    ];
    protected $dates = ['birth']->format('d/m/Y');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
