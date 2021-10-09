<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($this->method()=='PUT'){
            return [
                'name' => 'required|max:191|unique:products,name,' . $request->get('id'),
                'description' => 'required|max:2000',
                'price' =>'required|numeric',
                // 'promotion' =>'required|numeric',
                'category_id' => 'required',
                'product_code' => 'required|max:10',
                'isdisplay' => 'required',
            ]; 
        }
        else{
            return [
                'name' => 'required|unique:products|max:191',
                'description' => 'required|max:2000',
                'price' =>'required|numeric',
                // 'promotion' =>'required|numeric',
                'category_id' => 'required',
                'image' => 'required',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'product_code' => 'required|unique:products|max:10',
                'isdisplay' => 'required',
            ]; 
        }
    }
    public function messages()
    {
        return [ 
            'name.required'=>'Hãy nhập tên trang phục',
            'name.unique' => 'Tên trang phục đã tồn tại',
            'name.max'=>'Độ dài tối đa của tên trang phục là 191',
            'description.required'=>'Hãy nhập mô tả',
            'description.max'=>'Độ dài tối đa của mô tả là 2000',
            'price.required'=>'Hãy nhập giá',
            'price.numeric'=>'Hãy nhập số',
            // 'promotion.required'=>'Hãy nhập giá khuyến mãi',
            // 'promotion.numeric'=>'Hãy nhập số',
            'category_id.required'=>'Hãy chọn tên danh mục',
            'image.required'=>'Hãy chọn danh sách hình ảnh',
            'image.image'=>'Hãy chọn file ảnh',
            'image.*.image'=>'Hãy chọn file ảnh',
            'image.mimes'=>'Hãy chọn file ảnh',
            'product_code.required'=>'Hãy nhập mã trang phục',
            'product_code.unique' => 'Mã trang phục đã tồn tại',
            'status.required'=>'Hãy chọn trạng thái',
            'isdisplay.required'=>'Hãy chọn trạng thái hiển thị',
        ];
    }
}
