<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salurandrainase extends Model
{
    protected $table = 'salurandrainases';

    protected $fillable = [
        'nama_ruas_jalan', 'jenis_drainase', 'panjang_kiri', 'lebar_kiri',
        'panjang_kanan', 'lebar_kanan', 'tipe_drainase', 'kondisi_drainase',
        'linestring_kiri', 'linestring_kanan'
    ];

    protected $casts = [
        'linestring_kiri' => 'array',
        'linestring_kanan' => 'array',
    ];
} 