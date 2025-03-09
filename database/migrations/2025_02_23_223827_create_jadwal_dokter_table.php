<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_dokter', function (Blueprint $table) {
            $table->id(); 
            $table->string('nip')->unique(); 
            $table->string('nama_dokter'); 
            $table->enum('poli', ['umum', 'gigi', 'tht', 'lansia & disabilitas', 'balita', 'kia & kb', 'nifas/pnc']); 
            $table->ENUM('sesi', ['Pagi', 'Siang' ,'Sore', 'Malam']); 
            $table->time('jam_mulai'); 
            $table->time('jam_selesai'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_dokter');
    }
};
