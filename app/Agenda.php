<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    protected $fillable = ['username', 'tema', 'tema_seo', 'isi_agenda', 'tempat', 'pengirim', 'tgl_mulai', 'tgl_selesai', 'jam', 'gambar'];
    
}
