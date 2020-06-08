<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Repositories\News\NewsRepositoryInterface;
use App\Http\Controllers\CommonController;
use SCORPIO_Const;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
	public function __construct(
		NewsRepositoryInterface $newsRepository, 
		CommonController $commonController
	){
		$this->middleware('auth');
		$this->newsRepository = $newsRepository;
		$this->commonController = $commonController;
	}
    public function news()
    {
    	return view('template.news.index');
    }
    public function newsList(Request $request)
    {
    	if (!$request->get('page')== 1) {
            $i = 1;
        }else{
            $i = ($request->get('page')-1)+1;
        }
		$news = $this->newsRepository->getListNews()->orderBy('updated_at', 'DESC')->paginate(5);

		return view('admin.news.news-list', compact('i', 'news'));
    }
    public function newsCreate($id = null)
    {
    	if ($id) {
    		$news = $this->newsRepository->getNews($id);
    		$news_images = DB::table('news_images')->where('news_id', $id)->get();
    		return view('admin.news.news-update', compact('news', 'news_images'));
    	}else{
    		return view('admin.news.news-create');
    	}
    }
    public function postNewsCreate(NewsRequest $request, $id = null)
    {
    	$logs = '';
		$id = $request->id;
		$rand_attr = 'N0';
	    $name = $request->input('name');
	    $title = $request->input('title');
	    $news_date = $request->input('news_date');
	    $search_word = $request->input('search_word');
	    $news_url = $request->input('news_url');
	    $description = strip_tags($request->input('description'));
	    $news_type = $request->input('news_type');
	    $source = $request->input('source');
	    $tags = $request->input('tags');
	    $creator_id = Auth::user()->id;
	    $status = $request->input('status');
    	if (empty($id)) {
    		try {
    			$data = [
		            'news_code' => $this->commonController->rand_code(4, $rand_attr),
		            'name' => $name,
		            'title' => $title,
		            'news_date' => $news_date,
		            'search_word' => $search_word,
		            'news_url' => $news_url,
		            'news_type' => $news_type,
		            'description' => $description,
		            'source' => $source,
		            'tags' => $tags,
		            'creator_id' => $creator_id,
		            'status' => $status,
		            'created_at' => Carbon::now(),
		            'updated_at' => Carbon::now()
			    ];
		        $news_id = $this->newsRepository->insertGetId($data);
		        if (!empty($request->get('images'))) {
			        $add_images = $request->get('images');
			        foreach ($add_images as $key => $add_image) {
			        	$img_explode = explode("|",$add_image);
			        	$image_name = $img_explode[0];
			        	$sort_no = $img_explode[1];
			        	DB::table('news_images')->insert([
			        		'news_id' => $news_id,
			        		'path' => SCORPIO_Const::ALL_IMAGES,
			        		'file_name' => $img_explode[0],
			        		'sort_no' => $img_explode[1]
			        	]);
			            rename(SCORPIO_Const::TEMP_IMAGES.$image_name, public_path(SCORPIO_Const::ALL_IMAGES.$image_name));
			        }
		        }

    			$logs = 'Insert News';
			    $logs_status = 1;
			} catch (Exception $e) {
				$logs = 'Insert News'.$e->getMessage();
				$logs_status = 0;
			}
    		$this->commonController->writeLogs($logs, $logs_status);

	        return redirect()->route('news-list');
    	}else{
    		try {
    			$data = [
		            'name' => $name,
		            'title' => $title,
		            'news_date' => $news_date,
		            'search_word' => $search_word,
		            'news_url' => $news_url,
		            'news_type' => $news_type,
		            'description' => $description,
		            'source' => $source,
		            'tags' => $tags,
		            'creator_id' => $creator_id,
		            'status' => $status,
		            'updated_at' => Carbon::now()
			    ];
    			$this->newsRepository->update($id , $data);
			    if (!empty($request->get('images'))) {
				    $add_images = $request->get('images');
				    if ($add_images) {
				        foreach ($add_images as $add_image) {
				        	$img_explode = explode("|",$add_image);
				        	$image_name = $img_explode[0];
				        	$sort_no = $img_explode[1];
				        	DB::table('news_images')->insert([
				        		'news_id' => $id,
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
			    		DB::table('news_images')->where('id', $value)->where('news_id', $id)->delete();
			    	}
			    }
    			$logs = 'Update News';
			    $logs_status = 1;
			}catch (Exception $e) {
				$logs = 'Update News'.$e->getMessage();
				$logs_status = 0;
			}
    		$this->commonController->writeLogs($logs, $logs_status);

		    return redirect()->route('news-list');
    	}
    }
}
