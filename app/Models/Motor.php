<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';

    public function jenisMotor()
    {
        return $this->belongsTo(JenisMotor::class, 'id_jenis');
    }
}
