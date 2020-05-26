<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdmin extends FormRequest
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
            'ad_name' => 'required|max:190|min:3|unique:admins,ad_name,'.$this->id,
            'ad_email' => 'required|unique:admins,ad_email,'.$this->id,
            'ad_password' => 'required|unique:admins,ad_password,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'ad_name.required' => 'Trường này không được để trống',
            'ad_name.unique' => 'Trường này đã tồn tại',
            'ad_name.max' => 'Tên không được quá 190 ký tự',
             'ad_name.min' => 'Tên phải nhiều 3 ký tự',
             'ad_email.required' => 'Trường này không được để trống',
            'ad_email.unique' => 'Trường này đã tồn tại',
             'ad_password.required' => 'Trường này không được để trống',
            'ad_password.unique' => 'Trường này đã tồn tại'
        ];
    }
}
