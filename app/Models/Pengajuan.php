<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuans';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_pegawai',
        'id_kebutuhan',
        'id_kategori',
        'id_progres',
        'id_pic',
        'tgl_pengajuan'
    ];
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
    public function kebutuhan()
    {
        return $this->hasOne(Kebutuhan::class, 'id_kebutuhan', 'id_kebutuhan');
    }
    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function progres()
    {
        return $this->hasOne(Progres::class, 'id_progres', 'id_progres');
    }
    public function pic()
    {
        return $this->hasOne(penanggungJawab::class, 'id_pic', 'id_pic');
    }
}
