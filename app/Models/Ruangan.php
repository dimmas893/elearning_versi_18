<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';
    protected $fillable = [
        'siswa_id',
        // 'jurusan_id',
        'kelas_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }


    // public function mahasiswaAbsenHariIni()
    // {
    //     return $this->hasOne(Absen::class)
    //         ->whereNotNull('siswa_id')
    //         ->where('parent', '!=', 0)
    //         ->where('status', 1)
    //         ->whereDate('created_at', date('Y-m-d'));
    // }

    // public function isAbsen($jadwalId)
    // {
    //     return $this->absens()->whereNotNull('siswa_id')
    //     ->where('parent', '!=', 0)
    //     ->where('status', 1)
    //     ->where('jadwal_id', $jadwalId)
    //         ->whereDate('created_at', date('Y-m-d'));
    // }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d, M Y H:i');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
