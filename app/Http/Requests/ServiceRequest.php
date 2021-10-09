<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name_vi' => 'required|max:191',
            'name_en' => 'required|max:191',
            'description_vi' => 'required|max:191',
            'description_en' => 'required|max:191',
            'icon' => 'required',
        ];
    }
    public function messages()
    {
        return [ 
            'name_vi.required'=>'Hãy nhập tên dịch vụ',
            'name_vi.max'=>'Độ dài tối đa của tên dịch vụ là 191',
            'name_en.required'=>'Hãy nhập tên dịch vụ (Tiếng Anh)',
            'name_en.max'=>'Độ dài tối đa của tên dịch vụ (Tiếng Anh) là 191',
            'description_vi.required'=>'Hãy nhập mô tả',
            'description_vi.max'=>'Độ dài tối đa của mô tả là 191',
            'description_en.required'=>'Hãy nhập mô tả (Tiếng Anh)',
            'description_en.max'=>'Độ dài tối đa của mô tả (Tiếng Anh) là 191',
            'icon.required'=>'Hãy chọn icon hiển thị',
        ];
    }
}
