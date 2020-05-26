<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminProduct extends FormRequest
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
            'pro_name' => 'required|max:190|min:3|unique:products,pro_name,'.$this->id,
            'pro_price' => 'required',
            'pro_desc' => 'required',
            'pro_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required' => 'Danh mục không được để trống',
            'pro_name.unique' => 'Danh mục đã tồn tại',
            'pro_name.max' => 'Tên không được quá 190 ký tự',
             'pro_name.min' => 'Tên phải nhiều 3 ký tự',
             'pro_price.required' => 'Trường này không được để trống',
             'pro_desc.required' => 'Trường này không được để trống',
             'pro_content.required' => 'Trường này không được để trống',
        ];
    }
}
