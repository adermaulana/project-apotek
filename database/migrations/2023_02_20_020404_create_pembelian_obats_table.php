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
        Schema::create('pembelian_obats', function (Blueprint $table) {
            $table->id();
            $table->string("nama_obat");
            $table->string("harga_beli");
            $table->string("banyak");
            $table->string("sub_total");
            $table->string("nama_pemasok");
            $table->string("tanggal_beli");
            $table->string("total");
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
        Schema::dropIfExists('pembelian_obats');
    }
};
