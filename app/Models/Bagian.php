<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;
    protected $table = 'bagians';
    protected $primaryKey = 'id_bagian';
    protected $fillable = ['bagian'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_bagian');
    }
}
