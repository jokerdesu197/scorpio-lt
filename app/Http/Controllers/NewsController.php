<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function news()
    {
    	return view('template.news.index');
    }
    public function newsList($value='')
    {
    	return true;
    }
    public function newsCreate($id = null)
    {
    	if ($id) {
    		$news = $this->productRepository->getProduct($id);
    		$news_images = DB::table('news_images')->where('news_id', $id)->get();
    		return view('admin.news.news-update', compact('news', 'news_images'));
    	}else{
    		return view('admin.news.news-create');
    	}
    }
    public function postNewsCreate(NewsRequest $newsRequest, $id = null)
    {
    	$logs = '';
		$id = $request->id;
		$rand_attr = 'N0';
	    $name = $request->input('name');
	    $group_id = $request->input('group_id');
	    $creator_id = Auth::user()->creator_id;
	    $search_word = $request->input('search_word');
	    $title = $request->input('title');
	    $description = strip_tags($request->input('description'));
	    $unit = $request->input('unit');
	    $brand = $request->input('brand');
	    $supplier_id = $request->input('supplier_id');
	    $tags = $request->input('tags');
	    $status = $request->input('status');
    	if (empty($id)) {
    		try {
    			$data = [
		            'product_code' => $this->commonController->rand_code(4, $rand_attr),
		            'name' => $name,
		            'group_id' => $group_id,
		            'creator_id' => $creator_id,
		            'search_word' => $search_word,
		            'title' => $title,
		            'description' => $description,
		            'unit' => $unit,
		            'brand' => $brand,
		            'supplier_id' => $supplier_id,
		            'tags' => $tags,
		            'status' => $status,
		            'created_at' => Carbon::now(),
		            'updated_at' => Carbon::now()
			    ];
		        $product_id = $this->productRepository->insertGetId($data);
		        if (!empty($request->get('images'))) {
			        $add_images = $request->get('images');
			        foreach ($add_images as $key => $add_image) {
			        	$img_explode = explode("|",$add_image);
			        	$image_name = $img_explode[0];
			        	$sort_no = $img_explode[1];
			        	DB::table('product_images')->insert([
			        		'product_id' => $product_id,
			        		'path' => SCORPIO_Const::ALL_IMAGES,
			        		'file_name' => $img_explode[0],
			        		'sort_no' => $img_explode[1]
			        	]);
			            rename(SCORPIO_Const::TEMP_IMAGES.$image_name, public_path(SCORPIO_Const::ALL_IMAGES.$image_name));
			        }
		        }

    			$logs = 'Insert Product';
			    $logs_status = 1;
			} catch (Exception $e) {
				$logs = 'Insert Product'.$e->getMessage();
				$logs_status = 0;
			}
    		$this->commonController->writeLogs($logs, $logs_status);

	        return redirect()->route('product-list');
    	}else{
    		try {
    			$data = [
		            'name' => $name,
		            'group_id' => $group_id,
		            'creator_id' => $creator_id,
		            'search_word' => $search_word,
		            'title' => $title,
		            'description' => $description,
		            'unit' => $unit,
		            'brand' => $brand,
		            'supplier_id' => $supplier_id,
		            'tags' => $tags,
		            'status' => $status,
		            'updated_at' => Carbon::now()
			    ];
    			$this->productRepository->update($id , $data);
			    if (!empty($request->get('images'))) {
				    $add_images = $request->get('images');
				    if ($add_images) {
				        foreach ($add_images as $add_image) {
				        	$img_explode = explode("|",$add_image);
				        	$image_name = $img_explode[0];
				        	$sort_no = $img_explode[1];
				        	DB::table('product_images')->insert([
				        		'product_id' => $id,
				        		'path' => SCORPIO_Const::ALL_IMAGES,
				        		'file_name' => $img_explode[0],
				        		'sort_no' => $img_explode[1]
				        	]);
				            rename(SCORPIO_Const::TEMP_IMAGES.$image_name, public_path(SCORPIO_Const::ALL_IMAGES.$image_name));
				        }
				    }
			    }
			    if (!empty($request->get('delete-images'))) {
			    	$delete_images = $request->get('delete-images');
			    	foreach ($delete_images as $key => $value) {
			    		DB::table('product_images')->where('id', $value)->where('product_id', $id)->delete();
			    	}
			    }
    			$logs = 'Update Product';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Update Product'.$e->getMessage();
				$logs_status = 0;
			}
    		$this->commonController->writeLogs($logs, $logs_status);

		    return redirect()->route('product-list');
    	}
    }
}
