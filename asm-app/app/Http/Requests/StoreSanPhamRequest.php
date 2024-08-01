<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_san_pham' => [
                'required',
                'max:255',
                'unique:san_phams,ten_san_pham'
            ],
            'gia_san_pham' => [
                'required',
                'regex:/^\d{1,10}(\.\d{1,2})?$/',
                'min:0',
                'max:1000000000'
            ],
            'hinh_anh' => [
                'required',
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
            'gia_san_pham.regex' => 'Giá sản phẩm phải là số và có tối đa hai chữ số sau dấu thập phân!',
            'gia_san_pham.min' => 'Giá sản phẩm không được nhỏ hơn 0!',
            'gia_san_pham.max' => 'Giá sản phẩm không hợp lệ!',
            'hinh_anh.required' => 'Vui lòng không bỏ trống hình ảnh!',
            'hinh_anh.image' => 'Hình ảnh phải là một tệp ảnh!',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc webp!',
            'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB!',
            'so_luong.required' => 'Vui lòng không bỏ trống số lượng!',
            'so_luong.integer' => 'Số lượng phải là một số nguyên!',
            'so_luong.min' => 'Số lượng không được nhỏ hơn 0!',
            'mo_ta.required' => 'Vui lòng không bỏ trống mô tả sản phẩm!',
        ];
    }
}
