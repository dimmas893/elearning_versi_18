<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_tugas extends Model
{
    use HasFactory;
    protected $table = 'nilai_tugas';
    protected $fillable = [
        'tugas_id',
        'nilai',
        'komentar_guru',
        'siswa_id',
        'jadwal_id',
        'jawaban_siswa',
        'tanggal',
        'guru_id',
        'pertemuan',
        'status',
        'semester',
        'kelas_id',
        'tahun_ajaran'
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }
    
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }

    public function hitungTugas($a)
    {
        return 0.4 * $a;
    }

    public function hitungUts($a)
    {
        return 0.3 * $a;
    }

    public function hitungUas($a)
    {
        return 0.3 * $a;
    }

    public function hitungNilaiAkhir($a, $b, $c)
    {
        return $a + $b + $c;
    }

    public function huruf($a)
    {
        if ($a <= 100 && $a >= 80) {
            $huruf = "A";
        } else if ($a < 80 && $a >= 75) {
            $huruf = "B+";
        } elseif ($a < 75 && $a >= 65) {
            $huruf = "B";
        } elseif ($a < 65 && $a >= 60) {
            $huruf = "C+";
        } elseif ($a < 60 && $a >= 55) {
            $huruf = "C";
        } elseif ($a < 55 && $a >= 40) {
            $huruf = "D";
        } elseif ($a < 40 && $a >= 0) {
            $huruf = "E";
        }

        return $huruf;
    }
}
