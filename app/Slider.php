<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    protected $fillable = ['judul_slider', 'slider_seo', 'keterangan', 'tampilkan_keterangan', 'foto'];
    
}
