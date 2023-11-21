<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebutuhan extends Model
{
    use HasFactory;
    protected $table = 'kebutuhans';
    protected $primaryKey = 'id_kebutuhan';
    protected $fillable = [
        'jenis',
        'tentang',
        'deskripsi',
        'level',
        'foto'
    ];
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }
}
