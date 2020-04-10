<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userList($value='')
    {
    	//
    }

    public function userCreate($value='')
    {
    	return view('admin.user.user-create');
    }
}
