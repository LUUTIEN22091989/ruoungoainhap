<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminCategory extends FormRequest
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
            'c_name' => 'required|max:190|min:1|unique:categories,c_name,'.$this->id, //required : yêu cầu nhập unique là liên hệ tới bảng categories và ở cột c_name để unique ko trùng lặp và có độ dài từ 3-90 ký tự
        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Danh mục không được để trống',
            'c_name.unique' => 'Danh mục đã tồn tại',
            'c_name.max' => 'Tên không được quá 190 ký tự',
             'c_name.min' => 'Tên phải nhiều 1 ký tự',
        ];
    }
}
