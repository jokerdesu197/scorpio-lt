<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductClassRequest extends FormRequest
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
        	'product_code' => 'required|max:10',
            'product_id' => 'required',
            'product_group_id' => 'required',
            // 'creator_id' => 'required',
            'product_type_id' => 'required',
            'stock' => 'required|min:1|max:11|integer',
            'sale_limit' => 'required|min:1|max:11|integer',
            'price' => 'required|min:1|max:11|integer',
            'delivery_date' => 'required',
        ];
        return $rules;
    }
    public function messages() {
        $messages = [
            // 'name.required'=>"Not empty!",
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
