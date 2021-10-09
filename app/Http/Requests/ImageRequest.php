<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ImageRequest extends FormRequest
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
        return [
            'image' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]; 
    }
    public function messages()
    {
        return [ 
            'image.*.required'=>'Hãy chọn danh sách hình ảnh',
            'image.*.image'=>'Hãy chọn file ảnh',
            'image.*.mimes'=>'Hãy chọn file ảnh',
            'image.required'=>'Hãy chọn danh sách hình ảnh',
            'image.image'=>'Hãy chọn file ảnh',
        ];
    }
}
