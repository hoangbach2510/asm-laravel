<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\chi_tiet_don_hangs;
use App\Models\don_hangs;
use App\Models\san_phams;
use Faker\Factory as Faker;

class ChiTietDonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Lấy tất cả đơn hàng và sản phẩm từ cơ sở dữ liệu
        $donHangs = don_hangs::all();
        $sanPhams = san_phams::all();

        // Kiểm tra nếu có dữ liệu trong bảng don_hangs và san_phams
        if ($donHangs->count() > 0 && $sanPhams->count() > 0) {
            for ($i = 0; $i < 10; $i++) {
                // Lấy một đơn hàng và một sản phẩm ngẫu nhiên từ bộ sưu tập
                $donHang = $donHangs->random();
                $sanPham = $sanPhams->random();

                // Tạo chi tiết đơn hàng giả
                chi_tiet_don_hangs::create([
                    'don_hang_id' => $donHang->id,
                    'san_pham_id' => $sanPham->id,
                    'so_luong' => $faker->numberBetween(1, 10),
                    'don_gia' => $sanPham->gia_san_pham,
                    'thanh_tien' => $sanPham->gia_san_pham * $faker->numberBetween(1, 10),
                ]);
            }
        } else {
            // Hiển thị thông báo lỗi nếu không có dữ liệu trong bảng don_hangs hoặc san_phams
            $this->command->info('Không có dữ liệu trong bảng don_hangs hoặc san_phams.');
        }
    }
}
