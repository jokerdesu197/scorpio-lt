<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Auth;
use Carbon\Carbon;
use DB;
use App\Http\Controllers\CommonController;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
	public function __construct(UserRepositoryInterface $userRepository, CommonController $commonController) {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->commonController = $commonController;
    }
    public function userList(Request $request)
    {
    	if (Gate::allows('user-list', null)) {
	    	if (!$request->get('page')== 1) {
	            $i = 1;
	        }else{
	            $i = ($request->get('page')-1)+1;
	        }
	        $users = $this->userRepository->getListUser()->paginate(20);
	        return view('admin.user.user-list', compact('i', 'users'));
        }else{
	    	return redirect()->route('admin-login');
	    }
    }

    public function userCreate(Request $request, $id=null)
    {
	    if ($id || Auth::user()->id == 0) {
	    	$user = Auth::user();
    		if (Gate::allows('user-update', null) || $user->id == $id) {
    			$update_status = $request->update_status;
	    		$user = $this->userRepository->find($id);
	    		$roles = DB::table('roles')->where('deleted_at', null)->where('id', '>', 0)->get();
	    		return view('admin.user.user-update', compact('user', 'roles', 'update_status'));
		    }else{
		    	return redirect()->route('admin-login');
		    }
    	}else{
    		if (Gate::allows('user-create', null)) {
    			$roles = DB::table('roles')->where('deleted_at', null)->where('id', '>', 0)->get();
    			return view('admin.user.user-create', compact('roles'));
    		}else{
		    	return redirect()->route('admin-login');
		    }
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
	    $password = $request->input('password');
	    $role_id = $request->input('role_id');
	    $status = $request->input('status');

    	if (empty($id)) {
    		try {
    			$data = [
		            'name' => $name,
		            'login_id' => $login_id,
		            'tel_num' => $tel_num,
		            'email' => $email,
		            'fax' => $fax,
		            'birth' => $birth,
		            'sex' => $sex,
		            'address' => $address,
		            'role_id' => $role_id,
		            'creator_id' => Auth::user()->id,
		            'status' => $status,
		            'password' => bcrypt($password),
		            'created_at' => Carbon::now(),
		            'updated_at' => Carbon::now()
			    ];
    			$this->userRepository->insert($data);
    			$logs = 'Insert User';
			    $logs_status = 1;
			} catch (Exception $e) {
				$logs = 'Insert User'.$e->getMessage();
				$logs_status = 0;
			}
    		$this->commonController->writeLogs($logs, $logs_status);

	        return redirect()->route('user-list');
    	}else{
    		try {
    			$data = [
		            'name' => $name,
		            'login_id' => $login_id,
		            'tel_num' => $tel_num,
		            'email' => $email,
		            'fax' => $fax,
		            'birth' => $birth,
		            'sex' => $sex,
		            'address' => $address,
		            'role_id' => $role_id,
		            'creator_id' => Auth::user()->id,
		            'status' => $status
			    ];
			    $this->userRepository->update($id, $data);
    			$logs = 'Update User';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Update User'.$e->getMessage();
				$logs_status = 0;
			}
    		$this->commonController->writeLogs($logs, $logs_status);

		    return redirect()->route('user-list');
    	}
    }
    public function userDelete($id)
    {
		try {
			$data = [
				'deleted_at' => Carbon::now()
			];
			$this->userRepository->update($id, $data);
			$logs = 'Delete User';
		    $logs_status = 1;
		}catch (Exception $e) {
			$logs = 'Delete User'.$e->getMessage();
			$logs_status = 0;
		}
		$this->commonController->writeLogs($logs, $logs_status);
		
	    return redirect()->back();
    }
}
