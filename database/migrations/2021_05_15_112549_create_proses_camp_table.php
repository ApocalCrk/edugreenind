<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesCampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_camp', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proses', 255);
            $table->string('deskripsi_proses', 255)->nullable();
            $table->integer('urutan_proses');
            $table->enum('aktif', ['Y', 'N']);
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
        Schema::dropIfExists('proses_camp');
    }
}
