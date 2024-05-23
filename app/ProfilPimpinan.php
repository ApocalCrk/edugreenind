<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilPimpinan extends Model
{
    protected $table = 'profil_pimpinan';

    protected $fillable = ['judul', 'deskripsi', 'foto', 'aktif'];
    
}
