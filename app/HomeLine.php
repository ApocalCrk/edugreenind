<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeLine extends Model
{
    protected $table = 'homeline';

    protected $fillable = ['judul', 'deskripsi', 'icon', 'aktif'];
}
