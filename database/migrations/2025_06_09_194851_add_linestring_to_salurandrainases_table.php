<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasColumn('salurandrainases', 'linestring')) {
            Schema::table('salurandrainases', function (Blueprint $table) {
                $table->longText('linestring')->nullable();
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salurandrainases', function (Blueprint $table) {
            //
        });
    }
};