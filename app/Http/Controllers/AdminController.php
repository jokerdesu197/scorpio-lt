<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    public function index($value='')
    {
    	if (Auth::check()) {
    		return redirect()->route('dash-board');
    	}else{
    		return redirect()->route('admin-login');
    	}
    }
}
