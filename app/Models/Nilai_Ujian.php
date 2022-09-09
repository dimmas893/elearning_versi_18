<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_Ujian extends Model
{
    use HasFactory;
    protected $table = 'nilai_ujian';
    protected $fillable = [
        'ujian_id',
        'nilai',
        'komentar_guru',
        'siswa_id',
        'jadwal_id',
        'jawaban_siswa',
        'tanggal',
        'guru_id',
        'pertemuan',
        'semester',
        'kelas_id',
        'tahun_ajaran'
    ];
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }
    
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
