<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 100);
            $table->string('nama_lengkap', 255);
            $table->string('jenis_kelamin', 255);
            $table->string('no_hp', 255);
            $table->string('whatsapp', 255);
            $table->string('email', 255);
            $table->string('paket_kursus', 255);
            $table->string('ukuran_kaos', 10);
            $table->string('periode', 255);
            $table->string('tgl_datang', 255);
            $table->integer('jumlah_peserta');
            $table->string('status', 255)->default('Menunggu Konfirmasi');
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
        Schema::dropIfExists('pendaftaran');
    }
}
