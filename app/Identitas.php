<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $table = 'identitas';

    protected $fillable = [
        'nama_web', 'alamat_website', 'alamat', 'meta_deskripsi', 'meta_keyword', 'nama_instantsi', 'email', 'telp1', 'telp2', 'facebook', 'twitter', 'instagram', 'googlemap', 'favicon', 'logo', 'alumni', 'pengajar', 'pendaftar', 'lokasi', 'slider', 'non_slider', 'paket_kursus'
    ];
}
