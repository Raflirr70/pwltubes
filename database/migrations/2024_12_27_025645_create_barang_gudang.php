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
        Schema::create('barang_gudangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_barang')->unsigned();
            $table->bigInteger('id_gudang')->unsigned();
            $table->integer('jumlah_barang');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_gudang')->references('id')->on('gudangs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_gudang');
    }
};
