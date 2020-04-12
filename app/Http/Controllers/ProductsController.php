<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function productCreate($value='')
    {
    	return view('admin.product.product-create');
    }
}
