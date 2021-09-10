<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindaklanjutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindak_lanjut', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laporan_id')->nullable();
            $table->foreign('laporan_id')->references('id')->on('table_laporan');
            $table->integer('jumlah_tindaklanjut');
            $table->integer('jumlah_rekomendasi')->nullable();
            $table->date('tanggal_tindaklanjut');
            $table->string('file');
            $table->text('keterangan')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->enum('isDone', [0, 1])->default(0);
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
        Schema::dropIfExists('tindak_lanjut');
    }
}
