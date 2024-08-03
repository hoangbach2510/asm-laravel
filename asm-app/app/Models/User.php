<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'ho_va_ten', 'email','email_verification_token', 'password', 'so_dien_thoai', 'dia_chi', 'role', 'trang_thai','password_reset_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;

    public function loadAllTaiKhoan(){
        return User::orderBy('id', 'desc')->paginate(10);
    }


    public function searchTaiKhoan($keyword){
        return User::where('ho_va_ten', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('so_dien_thoai', 'LIKE', "%$keyword%")
                    ->orderBy('id', 'desc')
                    ->paginate(10);
    }


    public function addTaiKhoan($data){
        DB::table('users')->insert($data);
    }


    public function updateTaiKhoan($data, $id){
        $user = User::find($id);
        if ($user) {
            return $user->update($data);
        }
    }
}
