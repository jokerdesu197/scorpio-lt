<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Auth;
use Carbon\Carbon;
use DB;

class UsersController extends Controller
{
    public function userList(Request $request)
    {
    	if (!$request->get('page')== 1) {
            $i = 1;
        }else{
            $i = ($request->get('page')-1)+1;
        }
        $users = DB::table('users')->where('deleted_at', NULL)->paginate(20);
        return view('admin.user.user-list', compact('i', 'users'));
    }

    public function userCreate(Request $request, $id=null)
    {
    	if ($id) {
    		$user = DB::table('users')->where('id', $id)->first();
    		return view('admin.user.user-update', compact('user'));
    	}else{
    		return view('admin.user.user-create');
    	}
    }
    public function postUserCreate(UsersRequest $request, $id=null)
    {
    	$logs = '';
		$id = $request->id;
        $name = $request->input('name');
	    $login_id = $request->input('login_id');
	    $tel_num = $request->input('tel_num');
	    $email = $request->input('email');
	    $fax = $request->input('fax');
	    $birth = $request->input('birth');
	    $sex = $request->input('sex');
	    $address = $request->input('address');
	    $password = bcrypt($request->input('password'));
	    $role_id = $request->input('role_id');
	    $status = $request->input('status');
        // $user->creator_id = Auth::user()->id;
    	if (empty($id)) {
    		DB::beginTransaction();
    		try {
		        DB::table('users')->insert([
		            'name' => $name,
		            'login_id' => $login_id,
		            'tel_num' => $tel_num,
		            'email' => $email,
		            'fax' => $fax,
		            'birth' => $birth,
		            'sex' => $sex,
		            'address' => $address,
		            'role_id' => $role_id,
		            'status' => $status,
		            'password' => $password
			    ]);
			    DB::commit();
    			$logs = 'Insert User';
			    $logs_status = 1;
			} catch (Exception $e) {
				$logs = 'Insert User'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
    		DB::table('logs')->insert([
		    	'description' => $logs,
		    	// 'creator_id' => Auth::user()->id,
		    	'status' => $logs_status,
		    ]);
	        return redirect()->back();
    	}else{
    		DB::beginTransaction();
    		try {
    			$checkin = [
	                'password' => $password,
                ];
                if(Auth::attempt($checkin)){
                	return true;
                }else{
					return redirect()->back();
                }
			    DB::table('users')->where('id', $id)->update([
		            'name' => $name,
		            'login_id' => $login_id,
		            'tel_num' => $tel_num,
		            'email' => $email,
		            'fax' => $fax,
		            'birth' => $birth,
		            'sex' => $sex,
		            'address' => $address,
		            'role_id' => $role_id,
		            'status' => $status,
		            'password' => $password
			    ]);
			    DB::commit();
    			$logs = 'Update User';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Update User'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
    		DB::table('logs')->insert([
		    	'description' => $logs,
		    	// 'creator_id' => Auth::user()->id,
		    	'status' => $logs_status
		    ]);
		    return redirect()->route('user-list');
    	}
    }
    public function userDelete($id)
    {
    	DB::beginTransaction();
    		try {
			    DB::table('users')->where('id', $id)->update([
		            'deleted_at' => Carbon::now()
			    ]);
			    DB::commit();
    			$logs = 'Delete User';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Delete User'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
    		DB::table('logs')->insert([
		    	'description' => $logs,
		    	// 'creator_id' => Auth::user()->id,
		    	'status' => $logs_status
		    ]);
		    return redirect()->back();
    }
}
