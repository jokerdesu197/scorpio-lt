<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PermissionRole;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name', 'description', 'deleted_at'
    ];

    public function users() {
    	return $this->hasMany(User::class);
    }

    public function permissionRole($role_id) {
    	// return $this->belongsTo(PermissionRole::class);
    	$perm_id = PermissionRole::where('role_id', $role_id)->first();
    	return $perm_id;
    }
}
