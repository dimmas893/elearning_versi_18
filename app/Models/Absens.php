<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absens extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $fillable = ['status', 'siswa_id', 'jadwal_id', 'tanggal', 'pertemuan', 'semester', 'kelas_id', 'tahun_ajaran'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
