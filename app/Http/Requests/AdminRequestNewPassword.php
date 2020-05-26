<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestNewPassword extends FormRequest
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
            'email'       => 'required'.$this->id,
            'passwordNew' => 'required',
            'password_confirm' => 'required|same:passwordNew', //check bắt nhập và phải trùng vs mk trên
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Email không được để trống',
              'passwordNew.required' => 'Trường này không được để trống',
             'password_confirm.required' => 'Trường này không được để trống',
             'password_confirm.same' => 'Mật khẩu không khớp',
        ];
    }
}
