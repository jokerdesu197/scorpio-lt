<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
\Carbon\Carbon::setToStringFormat('d-m-Y');
use Auth;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = [];
    protected $table = "users";
    protected $fillable = [
        'name', 'login_id', 'tel_num','email', 'birth', 'sex', 'address','password', 'role_id','creator_id', 'login_date', 'status','deleted_at'
    ];
    protected $dates = ['birth', 'login_date'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($roleName) {
        return null !== $this->roles()->whereIn('name', $roleName)->first();
    } 
    
}
