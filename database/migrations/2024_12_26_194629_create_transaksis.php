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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_toko')->unsigned();
            $table->bigInteger('id_barang')->unsigned();
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_toko')->references('id')->on('tokos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
