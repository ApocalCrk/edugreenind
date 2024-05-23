<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected $fillable = ['unique_id','nama_lengkap', 'jenis_kelamin', 'no_hp', 'whatsapp', 'email', 'paket_kursus', 'periode', 'tgl_datang', 'jumlah_peserta', 'status', 'ukuran_kaos'];

    public function paket(){
        return $this->belongsTo('App\Paket', 'paket_kursus', 'id');
    }
}
