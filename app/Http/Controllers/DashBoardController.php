<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index($value='')
    {
    	return view('admin.index');
    }
}
