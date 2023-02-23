<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id");
            $table->foreignId("pemasok_id");
            $table->foreignId("unit_id");
            $table->string("nama_obat");
            $table->string("penyimpanan");
            $table->string("stok");
            $table->string("kadaluwarsa");
            $table->text("deskripsi_obat");
            $table->string("harga_beli");
            $table->string("harga_jual");
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
        Schema::dropIfExists('obats');
    }
};
