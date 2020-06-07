<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\CommonController;

class LoginController extends Controller
{
	public function __construct(CommonController $commonController){
		$this->commonController = $commonController;
	}
	public function getLogin() {
	  	return view('admin.login');
	}
	public function postLogin(Request $request) 
	{
		$login_id = $request->input('login_id');
		$password = $request->input('password');

	  	$rules = [
	  		'login_id' =>'required|min:3',
	  		'password' => 'required|min:3'
	  	];
	  	$messages = [
            'login_id.required' => 'Please enter the login_id',
            'login_id.min' => 'Login_id or password is incorrect!',
            'password.required' => 'Please enter the password',
            'password.min' => 'Login_id or password is incorrect!',
        ];
	  	$validator = Validator::make($request->all(), $rules, $messages);

	  	if ($validator->fails()) {
	  		return redirect()->back()->withErrors($validator)->withInput();
	  	} else {

	  		if ($login_id) {
				$checkin = [
	                'login_id' => $login_id,
	                'password' => $password,
	                'status' => 1
                ];
	            if(Auth::attempt($checkin)) 
	            {
	                $user = Auth::user();
	                return redirect()->route('admin-index');
	            } 
	            else 
	            {
	                $request->session()->flash('messages', 'login_id or password is incorrect!');
	                return redirect()->back();
	            }
			}
	  	}
	}
	public function Logout(){
	    Auth::logout();
	    session()->forget('login_id');
	    return redirect()->route('admin-login');
	}

	public function getRegister()
	{
		return view('admin.register');
	}
	public function postRegister(Request $request)
	{
        $rules = [
            'login_id' =>'required|min:3',
            'email' =>'required',
            'password' => 'min:3|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:3',
        ];
        $messages = [
            'login_id.required' => 'Please enter the login_id',
            'login_id.min' => 'login_id must contain at least 3 characters',
            'email.required' => 'Please enter the email',
            'password.required' => 'Please enter the password',
            'password.min' => 'Password must contain at least 3 characters',
            'password_confirmation.required_with'=>'Password does not match',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
		$logs = '';
        $login_id = $request->input('login_id');
        $email = $request->input('email');
        $password = $request->input('password');
        if ($validator->fails()) 
        {
            return redirect()->route('admin-register')->withErrors($validator)->withInput();
        }
        else
        {
			try {
	            $login_id = $request->input('login_id');
	            $email = $request->input('email');
	            $password = bcrypt($request->input('password'));
	            $role_id = 3;
	            DB::table('users')->insert([
		            'login_id' => $login_id,
		            'email' => $email,
		            'password' => $password,
		            'role_id' => $role_id,
		            'created_at' => Carbon::now(),
		            'updated_at' => Carbon::now()
			    ]);
				$logs = 'Create User';
			    $logs_status = 1;
		    } 
		    catch (Exception $e) {
				$logs = 'Create User'.$e->getMessage();
				$logs_status = 0;
			}
			$this->commonController->writeLogs($logs, $logs_status);
            return redirect()->route('admin-login');
        }
	}
}
