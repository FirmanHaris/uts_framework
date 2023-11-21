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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->foreignId('id_bagian');
            $table->string('nama', 50);
            $table->string('alamat', 50);
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('nomor', 12);
            $table->date('tgl_lahir');
            $table->foreign('id_bagian')->references('id_bagian')->on('bagians')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('pegawais');
    }
};
