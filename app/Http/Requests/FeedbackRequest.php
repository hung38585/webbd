<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
                'description' => 'required|max:500',
                'name' => 'required|max:191',
                'image' => 'image',
            ]; 
        }
        else {
            return [
                'description' => 'required|max:500',
                'name' => 'required|max:191',
                'image' => 'required|image',
            ]; 
        }
    }
    public function messages()
    {
        return [ 
            'description.required'=>'Hãy nhập nội dung',
            'description.max'=>'Độ dài tối đa của nội dung là 500',
            'name.required'=>'Hãy nhập tên cô dâu',
            'name.max'=>'Độ dài tối đa của tên cô dâu là 191',
            'image.required'=>'Hãy chọn hình ảnh',
            'image.image'=>'Hãy chọn hình ảnh',
        ];
    }
}
