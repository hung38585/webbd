<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ShareRequest extends FormRequest
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
                'title' => 'required|max:255|unique:shares,title,' . $request->get('id'),
                'content' => 'required|max:5000',
                'image' => 'image',
            ]; 
        }
        else {
            return [
                'title' => 'required|max:255|unique:shares',
                'content' => 'required|max:5000',
                'image' => 'image|required',
            ]; 
        }
    }
    public function messages()
    {
        return [ 
            'title.required'=>'Hãy nhập tiêu đề',
            'title.max'=>'Độ dài tối đa của tiêu đề là 255',
            'title.unique' => 'Tên tiêu đề đã tồn tại',
            'content.required'=>'Hãy nhập nội dung',
            'content.max'=>'Độ dài tối đa của nội dung là 5000',
            'image.required'=>'Hãy chọn hình ảnh',
            'image.image'=>'Hãy chọn hình ảnh',
        ];
    }
}
