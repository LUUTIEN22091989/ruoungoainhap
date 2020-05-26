<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminLogin extends FormRequest
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
            'ad_email'    => 'required|max:190|min:3,'.$this->id,
            'ad_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ad_email.required'    => 'Email không được để trống',
            'ad_email.max'          => 'Email không được quá 190 ký tự',
             'ad_email.min'         => 'Email phải nhiều 3 ký tự',
             'ad_password.required' => 'Password không được để trống',
        ];
    }
}
