<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'hinh_anh' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,webp,gif',
                'max:2048'
            ],
        ];
    }

    public function messages()
    {
        return [
            'hinh_anh.required' => 'Vui lòng không bỏ trống hình ảnh!',
            'hinh_anh.image' => 'Hình ảnh phải là một tệp ảnh!',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc webp!',
            'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB!',
        ];
    }
}
