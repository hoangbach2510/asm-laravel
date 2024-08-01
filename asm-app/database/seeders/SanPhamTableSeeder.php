<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\san_phams;
class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<10; $i++){
            san_phams::create([
                'ten_san_pham' => $faker -> word,
                'gia_san_pham' => $faker -> randomFloat(2, 100, 10000),
                'so_luong' => $faker -> numberBetween(1, 100),
                'mo_ta' => $faker -> sentence,
                'hinh_anh' => $faker->imageUrl(640, 480, 'san_phams', true),
                'gia_khuyen_mai' => $faker -> randomFloat(2, 100, 10000),
                'trang_thai' => $faker->randomElement(['1']),
                'khuyen_mai' => $faker->numberBetween(0, 50),
                'danh_muc_id' => $faker -> randomDigit
            ]);
        }
    }
}
