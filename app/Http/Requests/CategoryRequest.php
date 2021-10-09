<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
                'name' => 'required|max:191|unique:categories,name,' . $request->get('id'),
            ]; 
        }
        else{
            return [
                    'name' => 'required|unique:categories|max:191',
                ]; 
        }
    }
    public function messages()
    {
        return [ 
            'name.required'=>'Hãy nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.max'=>'Độ dài tối đa của tên danh mục là 191',
        ];
    }
}
