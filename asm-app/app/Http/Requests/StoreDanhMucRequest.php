<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDanhMucRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ten_danh_muc' => [
                'required',
                'string',
                'max:255',
                'unique:danh_mucs,ten_danh_muc'
            ]
        ];
    }

    public function messages()
    {
        return [
            'ten_danh_muc.required' => 'Vui lòng không bỏ trống !',
            'ten_danh_muc.unique' => 'Danh mục đã tồn tại !',
        ];
    }
}
