<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id=$this->route('id');
        return [
            'ten_san_pham' => [
                'required',
                'max:255',
                'unique:san_phams,ten_san_pham,'.$id
            ],
            'gia_san_pham' => [
                'required',
                'min:0',
                'regex:/^\d{1,10}(\.\d{1,2})?$/',
            ],
            'hinh_anh' => [
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048'
            ],
            'so_luong' => [
                'required',
                'integer',
                'min:0'
            ],
            'mo_ta' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'ten_san_pham.required' => 'Vui lòng không bỏ trống tên sản phẩm!',
            'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự!',
            'ten_san_pham.unique' => 'Tên sản phẩm đã tồn tại!',
            'gia_san_pham.required' => 'Vui lòng không bỏ trống giá sản phẩm!',
            'gia_san_pham.min' => 'Giá sản phẩm không được nhỏ hơn 0!',
            'gia_san_pham.regex' => 'Giá sản phẩm không hợp lệ!',
            'hinh_anh.image' => 'Hình ảnh phải là một tệp ảnh!',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif!',
            'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB!',
            'so_luong.required' => 'Vui lòng không bỏ trống số lượng!',
            'so_luong.integer' => 'Số lượng phải là một số nguyên!',
            'so_luong.min' => 'Số lượng không được nhỏ hơn 0!',
            'mo_ta.required' => 'Vui lòng không bỏ trống mô tả sản phẩm!',
        ];
    }
}
