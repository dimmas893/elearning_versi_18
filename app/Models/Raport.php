<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;
    protected $table = 'raport';
    protected $fillable = [
        'nilai_tugas',
        'nilai_ulangan',
        'nilai_ujian',
        'nilai_raport',
        'siswa_id',
        'kelas_id',
        'semester',
        'tahun_ajaran'
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
