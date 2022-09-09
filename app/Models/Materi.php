<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materi';
    protected $fillable = [
        'jadwal_id',
        'judul',
        'type',
        'file_or_link',
        'description',
        'tanggal',
        'pertemuan',
        'kelas_id',
        'tahun_ajaran',
        'semester'
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
