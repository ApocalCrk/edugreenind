<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alur extends Model
{
    protected $table = 'proses_camp';

    protected $fillable = ['nama_proses', 'deskripsi_proses', 'urutan_proses', 'aktif'];
}
