<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use SCORPIO_Const;
use App\Http\Requests\ACLRequest;

class ACLController extends Controller
{
    public function ACLlist()
    {
    	return true;
    }
    public function ACLCreate()
    {
    	$roles = DB::table('roles')->get();
      	$permission_1 = DB::table('permissions')->where('group','role')->get();
      	$permission_2 = DB::table('permissions')->where('group','user')->get();
      	return view('admin.ACL.ACL', compact('permission_1','permission_2', 'roles'));
    }
    public function postACLCreate(ACLRequest $request, $id = null)
    {
    	if ($id) {
            $arr = $request->input('permission_id');
            foreach ($arr as $key) {
                $permission_id = $key;
                $role_id = $id;
                DB::table('permissions_roles')->insert([
                  'permission_id' => $key,
                  'role_id' => $id,
                ]);
            }
            return redirect()->route('home-roles');
        }
        else{
            $role_name = $request->input('role_name');
            $description = $request->input('description');
            $id = DB::table('roles')->insertGetId([
                'role_name' => $role_name,
                'description' => $description,
            ]);
            $arr = $request->input('permission_id');
            foreach ($arr as $key) {
                $permission_id = $key;
                $role_id = $id;
                DB::table('permission_role')->insert([
                    'permission_id' => $key,
                    'role_id' => $id,
                ]);
            }
            return redirect()->route('home-roles');
        }
    }
}
