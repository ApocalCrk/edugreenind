<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = ['id_kat','judul_galeri','galeri_seo','keterangan','file'];

    public function album(){
        return $this->belongsTo('App\KategoriGaleri', 'id_kat', 'id');
    }
    
}
