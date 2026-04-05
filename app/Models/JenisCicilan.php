<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisCicilan extends Model
{
    protected $table = 'jenis_cicilan';
    protected $fillable = [
        'lama_cicilan',
        'margin_kredit',
    ];
}
