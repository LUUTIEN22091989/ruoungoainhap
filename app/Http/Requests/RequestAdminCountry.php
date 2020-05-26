<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminCountry extends FormRequest
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
            'co_name' => 'required|max:190|min:1|unique:countrys,co_name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'co_name.required' => 'Danh mục không được để trống',
            'co_name.unique' => 'Danh mục đã tồn tại',
            'co_name.max' => 'Tên không được quá 190 ký tự',
             'co_name.min' => 'Tên phải nhiều 1 ký tự',
        ];
    }
}
