<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    protected $table = 'asks';

    protected $fillable = ['pertanyaan', 'jawaban'];
}
