<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table -> string('ten_san_pham');
            $table -> double('gia_san_pham',10,2);
            $table -> Integer('so_luong');
            $table -> double ('gia_khuyen_mai',10,2);
            $table -> string('hinh_anh')->nullable;
            $table -> unsignedInteger('trang_thai')-> default(1);
            $table -> text('mo_ta')->nullable;
            $table -> unsignedBigInteger('danh_muc_id');
            $table -> unsignedInteger('khuyen_mai')->default(0);
            $table->timestamps();
            //ketnoi bảng
            $table -> foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
