<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    protected $table = 'album';
    
    protected $fillable = ['nama_kategori', 'album_seo', 'aktif'];
}
