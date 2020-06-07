<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//permission model
class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['id', 'name','description'];
    
    public function hasrole()
    {
    	$this->belongTo(Role::class);
    }
    public function roles() {
   		return $this->belongsToMany(Role::class);
	}
}
