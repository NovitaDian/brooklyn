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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('nama');

            // Ukuran
            $table->integer('luas_tanah');
            $table->integer('luas_bangunan');

            // Spesifikasi Bangunan
            $table->string('listrik');
            $table->string('air');
            $table->string('lantai');
            $table->string('atap');
            $table->string('dinding');
            $table->string('plafon');
            $table->string('kusen');
            $table->string('sanitary');
            $table->string('pintu');
            $table->string('jendela');
            $table->bigInteger('harga');

            // Kamar
            $table->integer('kt');
            $table->integer('km');

            // Foto
            $table->string('foto');
            $table->string('denah')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
