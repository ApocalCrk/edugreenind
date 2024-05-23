<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = ['nama_paket', 'paket_seo', 'waktu_paket', 'harga', 'keunggulan_paket', 'gambar', 'deskripsi_paket', 'aktif'];
}
