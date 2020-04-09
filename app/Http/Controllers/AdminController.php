<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($value='')
    {
    	return redirect()->route('admin-home');
    }
}
