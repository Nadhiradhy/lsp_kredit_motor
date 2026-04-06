<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisMotor extends Model
{
    protected $table = 'jenis_motor';
    protected $fillable = [
        'merk', 'jenis', 'deskripsi_jenis', 'image_url'
    ];

    public function jenisMotor()
    {
        return $this->belongsTo(JenisMotor::class, 'id_jenis');
    }
}
