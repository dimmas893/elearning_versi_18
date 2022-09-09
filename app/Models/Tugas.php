<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
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
