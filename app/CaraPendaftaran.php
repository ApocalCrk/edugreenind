<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaraPendaftaran extends Model
{
    protected $table = 'cara_pendaftaran';

    protected $fillable = ['judul', 'sub_judul', 'deskripsi'];
}
