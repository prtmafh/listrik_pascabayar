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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id('id_tagihan');
            $table->unsignedBigInteger('id_penggunaan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('bulan', 10);
            $table->year('tahun');
            $table->integer('jumlah_meter');
            $table->enum('status', ['belum bayar', 'sudah bayar'])->default('belum bayar');
            $table->timestamps();

            $table->foreign('id_penggunaan')->references('id_penggunaan')->on('penggunaan')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
