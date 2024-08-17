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
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_barang', 30)->primary(); // Id-barang sebagai primary key
            $table->string('nama_barang', 50); // Nama-Barang
            $table->string('merek', 20); // Merek
            $table->string('gambar'); // Gambar
            $table->text('rincian_barang')->nullable(); // Rincian barang, boleh kosong
            $table->double('harga'); // Harga barang
            $table->integer('stok'); // Jumlah barang tersedia
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade')->after('id_barang'); // Foreign key ke kategori_barang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
