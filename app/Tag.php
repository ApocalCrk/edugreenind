<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag_label';

    protected $fillable = ['nama_tag', 'tag_seo'];
    
}
