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
        Schema::create('siteplan_units', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit'); // A1, B3, dll
            $table->integer('x'); // posisi X di gambar
            $table->integer('y'); // posisi Y di gambar
            $table->enum('status', allowed: ['dijual', 'booked', 'build', 'dihuni'])->default('dijual');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siteplan_units');
    }
};
