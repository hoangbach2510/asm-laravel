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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->string('password');
            $table->string('so_dien_thoai',10)->nullable();
            $table->string('dia_chi')->nullable();
            $table->unsignedInteger('role')->default(1); // 0: quan tri vien 1: thanh vien
            $table->unsignedInteger('trang_thai')->default(0); // 0: tot 1: da khoa
            $table->rememberToken();
            $table->string('password_reset_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
