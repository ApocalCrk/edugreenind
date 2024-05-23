<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255);
            $table->string('tema', 255);
            $table->string('tema_seo', 255);
            $table->text('isi_agenda');
            $table->string('tempat', 255);
            $table->string('pengirim', 255);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('jam', 100);
            $table->string('gambar', 255);
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
        Schema::dropIfExists('agenda');
    }
}
