<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HalamanStatis extends Model
{
    protected $table = 'halamanstatis';

    protected $fillable = ['judul', 'judul_seo', 'isi_halaman', 'gambar'];
    
}
