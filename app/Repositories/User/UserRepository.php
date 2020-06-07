<?php

namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;
use App\Models\Permission;
use App\Models\PermissionRole;
use Auth;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
	
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }

    /**
     * var $permission
     * @return string
     */
    public function hasPermission($permission)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0) {
            return true;
        }
        $perm = Permission::where('name', strtolower($permission))->first();
        if ($perm) {
            $role = PermissionRole::where('role_id', $role_id)->first();
            $permission_role = array_values(json_decode($role->permission_id, true));
            return in_array($perm->id, $permission_role);
        }
        else {
            return false;
        }
    }
    public function getListUser()
    {
    	$qb = $this->_model::where('users.deleted_at', NULL)->where('users.role_id', '>', 0)
	         				->join('roles', 'roles.id', 'users.role_id')
	        				->select('users.id', 'users.name as user_name', 'users.login_id', 'users.email', 'users.tel_num', 'users.status', 'roles.name as role_name');
	     return $qb;
    }
    
}