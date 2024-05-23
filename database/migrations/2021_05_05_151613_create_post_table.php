<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kat');
            $table->string('username', 255);
            $table->string('judul', 255);
            $table->string('judul_seo', 255);
            $table->enum('headline', ['Y', 'N']);
            $table->text('isi_post');
            $table->string('gambar', 255);
            $table->enum('publish', ['Y', 'N']);
            $table->integer('dibaca')->default(0);
            $table->string('tag', 255)->nullable();
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
        Schema::dropIfExists('post');
    }
}
