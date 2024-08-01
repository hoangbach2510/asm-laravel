<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\gio_hangs;
use App\Models\tai_khoans;
use App\Models\san_phams;
use Faker\Factory as Faker;

class GioHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Lấy tất cả tài khoản và sản phẩm từ cơ sở dữ liệu
        $taiKhoans = tai_khoans::all();
        $sanPhams = san_phams::all();

        // Kiểm tra nếu có dữ liệu trong bảng tai_khoans và san_phams
        if ($taiKhoans->count() > 0 && $sanPhams->count() > 0) {
            for ($i = 0; $i < 10; $i++) {
                // Lấy một tài khoản và sản phẩm ngẫu nhiên từ bộ sưu tập
                $taiKhoan = $taiKhoans->random();
                $sanPham = $sanPhams->random();

                // Tính toán thành tiền dựa trên giá sản phẩm và số lượng
                $soLuong = $faker->numberBetween(1, 10);
                $thanhTien = $sanPham->gia_san_pham * $soLuong;

                // Debug: Kiểm tra giá trị id
                echo "tai_khoan_id: " . $taiKhoan->id . ", san_pham_id: " . $sanPham->id . "\n";

                gio_hangs::create([
                    'tai_khoan_id' => $taiKhoan->id,
                    'san_pham_id' => $sanPham->id,
                    'so_luong' => $soLuong,
                    'thanh_tien' => $thanhTien,
                ]);
            }
        } else {
            // Hiển thị thông báo lỗi nếu không có dữ liệu trong bảng tai_khoans hoặc san_phams
            $this->command->info('Không có dữ liệu trong bảng tai_khoans hoặc san_phams.');
        }
    }
}
