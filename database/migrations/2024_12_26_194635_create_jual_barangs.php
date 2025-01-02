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
        Schema::create('jual_barangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaksi')->unsigned();
            $table->bigInteger('id_barang')->unsigned();
            $table->integer('jumlah_barang');
            $table->decimal('total_harga');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jual_barang');
    }
};
