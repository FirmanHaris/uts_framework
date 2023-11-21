<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['id_bagian', 'nama', 'alamat', 'jenis_kelamin', 'nomor', 'tgl_lahir'];

    public function bagian()
    {
        return $this->hasOne(Bagian::class, 'id_bagian', 'id_bagian');
    }
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pegawai');
    }
}
