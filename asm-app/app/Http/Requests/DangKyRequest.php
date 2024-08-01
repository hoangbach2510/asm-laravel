<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'ho_va_ten' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.required' => 'Vui lòng không bỏ trống họ và tên !',
            'email.required' => 'Vui lòng không bỏ trống email !',
            'email.email' => 'Địa chỉ email không hợp lệ !',
            'email.unique' => 'Email đã được sử dụng!',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự !',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp !',
        ];
    }
}
