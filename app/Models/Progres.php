<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;
    protected $table = 'progres';
    protected $primaryKey = 'id_progres';
    protected $fillable = ['progres'];
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_progres');
    }
}
