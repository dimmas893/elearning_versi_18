<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $table = 'ujian';
    protected $fillable = [
        'jadwal_id',
        'judul',
        'type',
        'file_or_link',
        'description',
        'pengumpulan',
        'tanggal',
        'pertemuan',
        'semester',
        'kelas_id',
        'tahun_ajaran'
    ];


    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }
    
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
