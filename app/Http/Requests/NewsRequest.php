<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
        	// 'product_code' => 'required|max:10',
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            // 'creator_id' => 'required',
            'news_date' => 'required',
            'search_word' => 'required|max:50',
            'news_url' => 'required|max:255',
            'description' => 'required|max:5000',
            'news_type' => 'required|max:255',
            'source' => 'required|max:255',
            'tags' => 'max:50',
            'status' => 'required'
        ];
        return $rules;
    }
    public function messages() {
        $messages = [
            // 'title.required'=>"The title field is required.",
            // 'name.max'=>"Name maxlength is 50",
            // 'content.required'=>"Nội dung không được để trống!",
            // 'content.max'=>"Nội dung tối đa 5000 ký tự",
            // 'information.required'=> "Thông tin không được để trống",
            // 'information.max'=>"Thông tin tối đa 5000 ký tự",
            // 'cost_price.required'=> "Giá nhập không được để trống",
            // 'cost_price.max'=>"Giá nhập tối đa 11 ký tự",
            // 'cost_price.min'=> "Giá nhập tối thiểu là 0",
            // 'sale_price.required'=> "Giá bán không được để trống",
            // 'sale_price.max'=>"Giá bán tối đa 99999999999",
            // 'sale_price.min'=> "Giá bán tối thiểu là 0",
            // 'brand.required'=> "Nhãn hiệu không được để trống",
            // 'brand.max'=>"Nhãn hiệu tối đa 255 ký tự",
            // 'unit.required'=> "Đơn vị không được để trống",
            // 'unit.max'=>"Đơn vị tối đa 50 ký tự",
        ];
        return $messages;
     }
}
