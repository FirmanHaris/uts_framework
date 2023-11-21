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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->foreignId('id_pegawai');
            $table->foreignId('id_kebutuhan');
            $table->foreignId('id_kategori');
            $table->foreignId('id_progres');
            $table->foreignId('id_pic');
            $table->date('tgl_pengajuan');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_kebutuhan')->references('id_kebutuhan')->on('kebutuhans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_progres')->references('id_progres')->on('progres')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_pic')->references('id_pic')->on('penanggung_jawabs')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('pengajuans');
    }
};
