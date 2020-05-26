<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'name'     => 'required|max:190|min:3|unique:users,name,'.$this->id, //required : yêu cầu nhập unique là liên hệ tới bảng users và ở cột name để unique ko trùng lặp và có độ dài từ 3-90 ký tự
            'email'    => 'required|max:190|min:3|unique:users,email,'.$this->id,
            'phone'    => 'required|unique:users,phone,'.$this->id,
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Tên không được để trống',
            'name.unique'        => 'Tên đã tồn tại',
            'name.max'           => 'Tên không được quá 190 ký tự',
             'name.min'          => 'Tên phải nhiều 3 ký tự',
             'email.required'    => 'Email không được để trống',
            'email.unique'       => 'Email đã tồn tại',
            'email.max'          => 'Email không được quá 190 ký tự',
             'email.min'         => 'Email phải nhiều 3 ký tự',
             'phone.required'    => 'Phone không được để trống',
             'phone.unique'       => 'Phone đã tồn tại',
             'password.required' => 'Password không được để trống',
        ];
    }
}
