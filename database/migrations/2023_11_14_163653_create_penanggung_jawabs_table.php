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
        Schema::create('penanggung_jawabs', function (Blueprint $table) {
            $table->id('id_pic');
            $table->string('nama_pic', 50);
            $table->string('alamat', 50);
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('nomor', 50);
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('penanggung_jawabs');
    }
};
