<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['id_kat', 'username', 'judul', 'judul_seo', 'headline', 'isi_post', 'gambar', 'publish', 'dibaca', 'tag'];

    public function kategori(){
        return $this->belongsTo('App\Kategori', 'id_kat', 'id');
    }
    
}
