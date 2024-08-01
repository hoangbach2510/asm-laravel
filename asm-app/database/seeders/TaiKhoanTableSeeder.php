<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\tai_khoans;
class TaiKhoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<10; $i++){
            tai_khoans::create([
                'ho_va_ten' => $faker -> firstNameMale (1, true),
                'ten_dang_nhap' => $faker -> userName (1, true),
                'mat_khau' => $faker -> password (5, true),
                'email' => $faker -> email (1, true),
                'so_dien_thoai' => $faker -> e164PhoneNumber (1, true),
                'dia_chi' => $faker -> secondaryAddress (1, true),
                'role' => $faker -> randomDigitNot(1, true)
            ]);
        }
    }
}
