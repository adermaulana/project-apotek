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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obat_id');
            $table->foreignId('pelanggan_id')->unique();
            $table->string('harga_jual');
            $table->string('banyak');
            $table->string('tanggal_jual');
            $table->string('total');
            $table->timestamps();

            $table->foreign('obat_id')
            ->references('id')->on('obats')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
};
