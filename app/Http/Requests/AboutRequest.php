<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
        if ($this->method()=='PUT'){
            return [
                'content' => 'required|max:5000',
                'image' => 'image',
            ]; 
        }
        else {
            return [
                'content' => 'required|max:5000',
                'image' => 'required|image',
            ]; 
        }
    }
    public function messages()
    {
        return [ 
            'content.required'=>'Hãy nhập nội dung',
            'content.max'=>'Độ dài tối đa của nội dung là 5000',
            'image.required'=>'Hãy chọn hình ảnh',
            'image.image'=>'Hãy chọn hình ảnh',
        ];
    }
}
