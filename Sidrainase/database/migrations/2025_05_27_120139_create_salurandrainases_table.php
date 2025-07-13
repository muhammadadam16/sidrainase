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
        Schema::create('salurandrainases', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruas_jalan')->nullable();
            $table->string('jenis_drainase')->nullable();
            $table->string('panjang_kiri')->nullable();
            $table->string('lebar_kiri')->nullable();
            $table->string('panjang_kanan')->nullable();
            $table->string('lebar_kanan')->nullable();
            $table->string('tipe_drainase')->nullable();
            $table->string('kondisi_drainase')->nullable();
            $table->text('linestring');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salurandrainases');
    }
};