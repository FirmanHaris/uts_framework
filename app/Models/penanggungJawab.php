<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penanggungJawab extends Model
{
    use HasFactory;
    protected $table = 'penanggung_jawabs';
    protected $primaryKey = 'id_pic';
    protected $fillable = [
        'nama_pic',
        'alamat',
        'jenis_kelamin',
        'nomor',
        'tgl_lahir'
    ];
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pic');
    }
}
