<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductAllsRequest;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController;
use App\Model\Products;

class ProductAllsController extends Controller
{
	public function __construct(CommonController $commonController){
		$this->commonController = $commonController;
		$this->middleware('auth');
	}
	//Product Classes
	public function productClassList(Request $request)
	{
		if (!$request->get('page')== 1) {
            $i = 1;
        }else{
            $i = ($request->get('page')-1)+1;
        }
        $query = DB::table('product_classes as pc')->where('pc.deleted_at', NULL)
					->join('products as p', 'p.id', 'pc.product_id')
					->join('product_groups as pg', 'pg.id', 'pc.product_group_id')
					->join('product_types as pt', 'pt.id', 'pc.product_type_id');
        $product_classes =	$query->select(['pc.id','pc.class_code', 'p.name as product', 'pg.name as group', 'pt.name as type', 'pc.price02', 'pc.sale_limit'])->paginate(5);
        						
		return view('admin.product.product-class-list', compact('i', 'product_classes'));
	}
    public function productClassCreate($id=null)
    {
    	$products = DB::table('products')->where('deleted_at', null)->get();
    	$product_types = DB::table('product_types')->where('deleted_at', null)->get();
    	if ($id) {
    		$product_class = DB::table('product_classes')->where('id', $id)->first();
    		return view('admin.product.product-class-update', compact('products', 'product_types', 'product_class'));
    	}else{
    		$product_types = DB::table('product_types')->where('deleted_at', null)->get();
    		return view('admin.product.product-class-create', compact('products', 'product_types', 'product_types'));
    	}
    }
    public function postProductClassCreate(ProductClassRequest $request, $id=null)
    {
    	$logs = '';
	    $rand_attr = 'PC';
	    $product_id = $request->input('product_id');
	    $product_group_id = Product::getProductGroup($product_id);
	    $product_type_id = $request->input('product_type_id');
	    $stock = $request->input('stock');
	    $sale_limit = $request->input('sale_limit');
	    $price01 = $request->input('price01');
	    $price02 = $request->input('price02');
	    $delivery_date = $request->input('delivery_date');
	    // $creator_id = $request->input('creator_id');
    	if (empty($id)) {
    		DB::beginTransaction();
    		try {
		        DB::table('product_classes')->insert([
		            'class_code' => $this->commonController->rand_code(4, $rand_attr),
				    'product_id' => $product_id,
				    'product_group_id' => $product_group_id,
				    'product_type_id' => $product_type_id,
				    'stock' => $stock,
				    'sale_limit' => $sale_limit,
				    'price01' => $price01,
				    'price02' => $price02,
				    'delivery_date' => $delivery_date,
				    // 'creator_id' => $creator_id
				    'created_at' => Carbon::now(),
				    'updated_at' => Carbon::now()
			    ]);
			    DB::commit();
    			$logs = 'Insert Product Class';
			    $logs_status = 1;
			} catch (Exception $e) {
				$logs = 'Insert Product Class'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
    		$this->commonController->writeLogs($logs, $logs_status);

	        return redirect()->route('product-class-list');
    	}else{
    		DB::beginTransaction();
    		try {
			    DB::table('product_classes')->insert([
		            'class_code' => $this->commonController->rand_code(4, $rand_attr),
				    'product_id' => $product_id,
				    'product_group_id' => $product_group_id,
				    'product_type_id' => $product_type_id,
				    'stock' => $stock,
				    'sale_limit' => $sale_limit,
				    'price01' => $price01,
				    'price02' => $price02,
				    'delivery_date' => $delivery_date,
				    // 'creator_id' => $creator_id
				    'updated_at' => Carbon::now()
			    ]);
			    DB::commit();
    			$logs = 'Update Product Class';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Update Product Class'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
			$this->commonController->writeLogs($logs, $logs_status);

		    return redirect()->route('product-class-list');
    	}
    }
    public function productClassDelete($id)
    {
    	DB::beginTransaction();
		try {
		    DB::table('product_classes')->where('id', $id)->update([
	            'deleted_at' => Carbon::now()
		    ]);
		    DB::commit();
			$logs = 'Delete Product Class';
		    $logs_status = 1;
		}catch (Exception $e) {
			$logs = 'Delete Product Class'.$e->getMessage();
			$logs_status = 0;
			DB::rollBack();
		}
		DB::table('logs')->insert([
	    	'description' => $logs,
	    	// 'creator_id' => Auth::user()->id,
	    	'status' => $logs_status
	    ]);
	    return redirect()->back();
    }

	//Product Groups
	public function productGroupList(Request $request)
	{
		if (!$request->get('page')== 1) {
            $i = 1;
        }else{
            $i = ($request->get('page')-1)+1;
        }
        $product_groups = DB::table('product_groups')->where('deleted_at', NULL)->paginate(5);
		return view('admin.product.product-group-list', compact('i', 'product_groups'));
	}
    public function productGroupCreate($id=null)
    {
    	if ($id) {
    		$group = DB::table('product_groups')->where('id', $id)->first();
    		return view('admin.product.product-group-update', compact('group'));
    	}else{
    		return view('admin.product.product-group-create');
    	}
    }
    public function postProductGroupCreate(Request $request, $id=null)
    {
    	$request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:5000',
        ],
        [
            'name.required'=>"Not be empty. Enter type name",
            'name.max'=>"Type name max 255 character",
            'description.required'=>"Not be empty. Enter description",
            'description.max'=>"Type description max 5000 character",
        ]);
    	$logs = '';
		$id = $request->get('id');
	    $name = $request->input('name');
	    $description = $request->input('description');
	    // $creator_id = $request->input('creator_id');
    	if (empty($id)) {
    		DB::beginTransaction();
    		try {
		        DB::table('product_groups')->insert([
		            'name' => $name,
		            'description' => $description
		            // 'creator_id' => $creator_id,
			    ]);
			    DB::commit();
    			$logs = 'Insert Product Group';
			    $logs_status = 1;
			} catch (Exception $e) {
				$logs = 'Insert Product Group'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
    		$this->commonController->writeLogs($logs, $logs_status);

	        return redirect()->route('product-gr-list');
    	}else{
    		DB::beginTransaction();
    		try {
			    DB::table('product_groups')->insert([
		            'name' => $name,
		            'description' => $description
		            // 'creator_id' => $creator_id,
			    ]);
			    DB::commit();
    			$logs = 'Update Product Group';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Update Product Group'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
    		$this->commonController->writeLogs($logs, $logs_status);

		    return redirect()->route('product-gr-list');
    	}
    }
    public function productGroupDelete($id)
    {
    	DB::beginTransaction();
		try {
		    DB::table('product_groups')->where('id', $id)->update([
	            'deleted_at' => Carbon::now()
		    ]);
		    DB::commit();
			$logs = 'Delete Product Group';
		    $logs_status = 1;
		}catch (Exception $e) {
			$logs = 'Delete Product Group'.$e->getMessage();
			$logs_status = 0;
			DB::rollBack();
		}
		$this->commonController->writeLogs($logs, $logs_status);

	    return redirect()->back();
    }

    //Product Types
	public function productTypeList(Request $request)
	{
		if (!$request->get('page')== 1) {
            $i = 1;
        }else{
            $i = ($request->get('page')-1)+1;
        }
		$product_types = DB::table('product_types')->where('deleted_at', NULL)->paginate(5);
		return view('admin.product.product-type-list', compact('i', 'product_types'));
	}
    public function productTypeCreate($id=null)
    {
    	if ($id) {
    		$product_type = DB::table('product_types')->where('id', $id)->first();
    		return view('admin.product.product-type-update', compact('product_type'));
    	}else{
    		return view('admin.product.product-type-create');
    	}
    }
    public function postProductTypeCreate(Request $request, $id=null)
    {
    	$request->validate([
            'name'=>'required|max:255',
        ],
        [
            'name.required'=>"Not be empty. Enter type name",
            'name.max'=>"Type name max 255 character",
        ]);
    	$logs = '';
		$id = $request->id;
	    $name = $request->input('name');
	    // $creator_id = $request->input('creator_id');
    	if (empty($id)) {
    		DB::beginTransaction();
    		try {
		        DB::table('product_types')->insert([
		            'name' => $name
		            // 'creator_id' => $creator_id,
			    ]);
			    DB::commit();
    			$logs = 'Insert Product Type';
			    $logs_status = 1;
			} catch (Exception $e) {
				$logs = 'Insert Product Type'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
			$this->commonController->writeLogs($logs, $logs_status);

	        return redirect()->route('product-type-list');
    	}else{
    		DB::beginTransaction();
    		try {
			    DB::table('product_types')->insert([
		            'name' => $name
		            // 'creator_id' => $creator_id,
			    ]);
			    DB::commit();
    			$logs = 'Update Product Type';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Update Product Type'.$e->getMessage();
				$logs_status = 0;
				DB::rollBack();
			}
			$this->commonController->writeLogs($logs, $logs_status);

		    return redirect()->route('product-type-list');
    	}
    }
    public function productTypeDelete($id)
    {
    	DB::beginTransaction();
		try {
		    DB::table('product_types')->where('id', $id)->update([
	            'deleted_at' => Carbon::now()
		    ]);
		    DB::commit();
			$logs = 'Delete Product Type';
		    $logs_status = 1;
		}catch (Exception $e) {
			$logs = 'Delete Product Type'.$e->getMessage();
			$logs_status = 0;
			DB::rollBack();
		}
		$this->commonController->writeLogs($logs, $logs_status);

	    return redirect()->back();
    }
}
