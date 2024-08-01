<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\don_hangs;
use App\Models\tai_khoans;
use Faker\Factory as Faker;

class DonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Lấy tất cả tài khoản từ cơ sở dữ liệu
        $taiKhoans = tai_khoans::all();

        // Kiểm tra nếu có dữ liệu trong bảng tai_khoans
        if ($taiKhoans->count() > 0) {
            for ($i = 0; $i < 10; $i++) {
                // Lấy một tài khoản ngẫu nhiên từ bộ sưu tập
                $taiKhoan = $taiKhoans->random();

                // Tạo đơn hàng giả
                don_hangs::create([
                    'tai_khoan_id' => $taiKhoan->id,
                    'ho_ten_nhan' => $faker->name,
                    'ngay_dat_hang' => $faker->date(),
                    'dia_chi_nhan' => $faker->address,
                    'so_dt_nhan' => $faker->numerify('##########'),
                    'trang_thai' => $faker->numberBetween(0, 3),
                    'phuong_thuctt' => $faker->numberBetween(0, 1),
                    'thanh_toan' => $faker->numberBetween(0, 1),
                ]);
            }
        } else {
            // Hiển thị thông báo lỗi nếu không có dữ liệu trong bảng tai_khoans
            $this->command->info('Không có dữ liệu trong bảng tai_khoans.');
        }
    }
}
