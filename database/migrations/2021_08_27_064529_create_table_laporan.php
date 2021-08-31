<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_laporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengirim_id')->nullable();
            $table->foreign('pengirim_id')->references('id')->on('users');
            $table->string('nama_laporan');
            $table->string('instansi_penerima');
            $table->string('nama_penerima')->nullable();
            $table->string('alamat_instansi');
            $table->text('keterangan')->nullable();
            $table->string('image')->nullable();
            $table->enum('isTerkirim', [0, 1])->default(0);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_laporan');
    }
}
