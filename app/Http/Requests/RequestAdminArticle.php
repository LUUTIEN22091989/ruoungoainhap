<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminArticle extends FormRequest
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
            'a_name' => 'required|max:190|min:3|unique:articles,a_name,'.$this->id, //required : yêu cầu nhập unique là liên hệ tới bảng categories và ở cột a_name để unique ko trùng lặp và có độ dài từ 3-90 ký tự
            'a_description' => 'required',
            'a_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'a_name.required' => 'Trường này không được để trống',
            'a_name.unique' => 'Trường này đã tồn tại',
            'a_name.max' => 'Tên không được quá 190 ký tự',
             'a_name.min' => 'Tên phải nhiều 3 ký tự',
             'a_description.required' => 'Trường này không được để trống',
             'a_content.required' => 'Trường này không được để trống',
        ];
    }
}
