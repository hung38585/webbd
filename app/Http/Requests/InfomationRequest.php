<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfomationRequest extends FormRequest
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
                'name' => 'required|max:191',
                'phone' => 'required|max:191',
                'mail' => 'required|max:191',
                'address' => 'required|max:191',
                'facebook' => 'required|max:191',
                'video' => 'mimes:mp4|max:40000'
            ];
        }else{
            return [
                    'name' => 'required|max:191',
                    'phone' => 'required|max:191',
                    'mail' => 'required|max:191',
                    'address' => 'required|max:191',
                    'facebook' => 'required|max:191',
                    'video' => 'required|mimes:mp4|max:40000'
                ]; 
        }    
    }
    public function messages()
    {
        return [ 
            'name.required'=>'Hãy nhập tên tiệm',
            'name.max'=>'Độ dài tối đa của tên tiệm là 191',
            'phone.required'=>'Hãy nhập số điện thoại',
            'phone.max'=>'Độ dài tối đa của số điện thoại là 191',
            'mail.required'=>'Hãy nhập email',
            'mail.max'=>'Độ dài tối đa của email là 191',
            'address.required'=>'Hãy nhập địa chỉ',
            'address.max'=>'Độ dài tối đa của địa chỉ là 191',
            'facebook.required'=>'Hãy nhập facebook',
            'facebook.max'=>'Độ dài tối đa của facebook là 191',
            'video.required'=>'Hãy chọn video',
            'video.mimes'=>'Hãy chọn video mp4',
            'video.max'=>'Hãy chọn video có dung lượng nhỏ hơn 40Mb',
        ];
    }
}
