<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
     // Tabel di database
    protected $primaryKey = 'id';  // Primary key

    protected $fillable = [
        'nama_karyawan',
        'perusahaan',
        'gaji_pokok',
        'bonus',
        'total_gaji',
        'status',
    ];

    protected $table = 'penggajian';
    
}
