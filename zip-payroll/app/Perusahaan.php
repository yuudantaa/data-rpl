<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'nama_bank',
        'rekening',
        'jumlah_karyawan',
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'perusahaan_id');
    }
    public function sumberDana()
{
    return $this->belongsTo(SumberDana::class);
}
public function penggajian()
{
    return $this->hasMany(Penggajian::class);
}

}
