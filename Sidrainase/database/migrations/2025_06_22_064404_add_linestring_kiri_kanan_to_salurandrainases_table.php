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
        Schema::table('salurandrainases', function (Blueprint $table) {
            $table->longText('linestring_kiri')->nullable()->after('kondisi_drainase');
            $table->longText('linestring_kanan')->nullable()->after('linestring_kiri');
            $table->dropColumn('linestring');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salurandrainases', function (Blueprint $table) {
            $table->longText('linestring')->nullable();
            $table->dropColumn('linestring_kiri');
            $table->dropColumn('linestring_kanan');
        });
    }
};