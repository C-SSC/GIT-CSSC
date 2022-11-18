<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietNhapKho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietNhapKho', function (Blueprint $table) {
            $table->id();
            $table->string('id_san_pham');
            $table->string('ten_san_pham');
            $table->integer('so_luong');
            $table->integer('don_hang_id')->nullable();
            $table->integer('don_gia')->nullable();
            $table->integer('thanh_tien')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_nhap_kho');
    }
}
