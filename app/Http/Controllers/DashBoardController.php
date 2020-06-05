<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class DashBoardController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if (Auth::check()) {
            $user = Auth::user();
            if ($user->name == null || $user->tel_num == null|| $user->birth == null|| $user->sex == null) {
                return redirect()->route('user-update', ['id' => $user->id, 'update_status' => 1]);
            }else{
    		  return view('admin.dashboard');  
            }
    	}else{
    		return redirect()->route('get-login');
    	}
    }
}
