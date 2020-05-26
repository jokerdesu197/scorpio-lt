<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function pageIndex()
	{
		return redirect()->route('f-news-index');
	}
    public function productList($value='')
    {
    	return true;
    }
    public function productDetail(Request $request,$id)
    {
    	return view('template.product.product-detail');
    }
}
