<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use SCORPIO_Const;
use Intervention\Image\ImageManagerStatic as Image;

class CommonController extends Controller
{
    public function writeLogs($logs, $logs_status)
    {
    	$date_line = Carbon::now()->subDays(30);
    	DB::table('logs')->where('created_at', '<', $date_line)->delete();
        DB::table('logs')->insert([
            'description' => $logs,
            // 'creator_id' => Auth::user()->id,
            'status' => $logs_status
        ]);
    }
    function rand_code($length, $rand_attr) {
        switch ($rand_attr) {
            case 'P':
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                break;
            default:
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                break;
        }
		$size = strlen($chars);
		for( $i = 0; $i < $length; $i++ ) {
			$str = substr(str_shuffle($chars), 0, $length);
            $str_code = $rand_attr.'-'.$str;
		}
        $check_code = DB::table('products')->where('product_code', $str_code)->count();
        if ($check_code) {
            rand_code();
        }
		return $str_code;
	}
    public function addImage(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException();
        }

        $images = $request->files->get('image_upload');
        $allowExtensions = ['gif', 'jpg', 'jpeg', 'png'];
        $files = [];
        if (count($images) > 0) {
            foreach ($images as $image) {
                $mimeType = $image->getMimeType();
                
                if (0 !== strpos($mimeType, 'image')) {
                    throw new UnsupportedMediaTypeHttpException();
                }
                $extension = $image->getClientOriginalExtension();
                if (!in_array($extension, $allowExtensions)) {
                    throw new UnsupportedMediaTypeHttpException();
                }
                $image_thumb = $this->resizeImage($image, $extension);
                $files[] = $image_thumb;
            }
        }
        return response()->json(['files' => $files], 200);
    }
    public function resizeImage($image, $extension)
    {
        $filename = date('mdHis').'_thumb.'.$extension;
        $image_resize = Image::make($image->getRealPath());              
        $image_resize->resize(360, 270);
        $image_resize->save(public_path(SCORPIO_Const::TEMP_IMAGES.$filename));
        return $filename;
        
    }
}
