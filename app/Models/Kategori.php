<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['kategori'];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_kategori');
    }
}
