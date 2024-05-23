<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_web', 255)->nullable();
            $table->string('alamat_website', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('meta_deskripsi', 255)->nullable();
            $table->string('meta_keyword', 255)->nullable();
            $table->string('nama_instansi', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('telp1', 255)->nullable();
            $table->string('telp2', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->text('googlemap')->nullable();
            $table->string('favicon', 255)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('alumni', 255)->nullable();
            $table->string('pengajar', 255)->nullable();
            $table->string('pendaftar', 255)->nullable();
            $table->string('lokasi', 255)->nullable();
            $table->enum('slider', ['Y', 'N'])->default('Y');
            $table->enum('paket_kursus', ['Y', 'N'])->default('Y');
            $table->string('non_slider', 255);
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
        Schema::dropIfExists('identitas');
    }
}
