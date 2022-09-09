<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Absens;
use App\Models\Jadwal;
use App\Models\Materi;
use App\Models\Nilai_tugas;
use App\Models\Ruangan;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        return view('frontend.siswa.index');
    }

    public function jadwal()
    {
        $ruangan = Ruangan::with('siswa')->where('siswa_id', Auth::guard('siswa')->user()->id)->first();
        $jadwals = Jadwal::with('mata_pelajaran', 'hari', 'guru')->where('kelas_id', $ruangan->kelas_id)->get();
        // dd($jadwals);
        return view('frontend.siswa.jadwal', compact('jadwals'));
    }

    public function masuk($id)
    {
        $jadwal = Jadwal::with(['kelas'], ['guru'], ['mata_pelajaran'])->where('id', decrypt($id))->first();
        $checkabsen = Absens::where('jadwal_id', $jadwal->id)->where('siswa_id', Auth::guard('siswa')->user()->id)->first();
        $ruangan = Ruangan::with('siswa')->where('kelas_id', $jadwal->kelas->id)->get();



        // Jika waktu pada jadwal sesuai maka jalankan code dibawah 
        if (\Carbon\Carbon::now('Asia/Jakarta')->format('H:i') >= $jadwal->jam_masuk && \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') <= $jadwal->jam_keluar) {

            // Code dibawah untuk menampilkan seluruh mahasiswa yang berada di kelas yang sama dan dijadwal yang sama
            // Beserta menampilkan  absensi hari ini


            // $mahasiswa = Jadwal::with(['ruangan'], ['guru'], ['mata_pelajaran'])->where('ruangan_id', $ruangan->id)->where()->where('id', decrypt($id))->first();
            // $absen = Absen::where('guru_id', Auth::guard('guru')->user()->id)->where('jadwal_id', $jadwal->id)->where('siswa_id', $jadwal->ruangan->siswa->id)->get();
            // $siswa = Ruangan::with('siswa')->get();
            $hariini = \Carbon\Carbon::now()->format('Y-m-d');
            $absens = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->get();
            $absen_izin_total = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'izin')->count('siswa_id');
            $absen_alpha_total = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'alpa')->count('siswa_id');
            $absen_sakit_total = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'sakit')->count('siswa_id');



            $counthariini_sakit = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'sakit')->where('created_at', $hariini)->count('siswa_id');
            $counthariini_alpa = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'alpa')->where('created_at', $hariini)->count('siswa_id');
            $counthariini_izin = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'izin')->where('created_at', $hariini)->count('siswa_id');


            $tugas_hari_ini = Tugas::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->count();
            $tugas_hari_ini_tampil = Tugas::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->get();

            // $semua_tugas = Tugas::with('jadwal')->where('jadwal_id', $jadwal->id)->count();
            // $semua_tugas = Tugas::with('jadwal')->where('jadwal_id', $jadwal->id)->count();
            $semua_tugas = Nilai_tugas::with('tugas')->where('jadwal_id', $jadwal->id)->where('siswa_id', Auth::guard('siswa')->user()->id)->count();
            $semua_tugas_tampil = Nilai_tugas::with('tugas')->where('jadwal_id', $jadwal->id)->where('siswa_id', Auth::guard('siswa')->user()->id)->get();

            $semua_materi_tampil = Materi::with('jadwal')->where('jadwal_id', $jadwal->id)->where('jadwal_id', $jadwal->id)->get();


            $materi_hari_ini_tampil = Materi::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->get();
            $materi_hari_ini = Materi::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->count();

            $hadir = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->get();
            $hadir_count = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'hadir')->where('tanggal', $hariini)->count('siswa_id');

            $count = Ruangan::with('siswa')->where('kelas_id', $jadwal->kelas->id)->count('siswa_id');
            // $pp = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'hadir')->where('tanggal', $hariini)->count('siswa_id');




            // $pp = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status', '!=', null)->where('tanggal', $hariini)->count('siswa_id');
            $hitung_absen = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status', '!=', 'hadir')->where('tanggal', $hariini)->count('siswa_id');
            $sakit = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status',  'sakit')->where('tanggal', $hariini)->count('siswa_id');
            $pp = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status',  'hadir')->where('tanggal', $hariini)->count('siswa_id');
            $izin = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status',  'izin')->where('tanggal', $hariini)->count('siswa_id');
            $alpa = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status',  'alpa')->where(
                'tanggal',
                $hariini
            )->count('siswa_id');

            $semua_tugas_tampil_tampil = Nilai_tugas::with('tugas')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->where('siswa_id', Auth::guard('siswa')->user()->id)->get();

            $total = $sakit + $izin + $alpa + $pp;

            $total_hadir = $count - $total;
            $total_hadir_siswa = $count;

            // $mahasiswaHadir = $absen->where('parent',  null)->count();
            // $mahasiswaTidakHadir = $absen->where('parent', '==', null)->count();

            // Code dibawah untuk menampilkan data absen yang telah dibuat oleh dosen untuk hari ini
            // dan akan digunakan untuk simpan rekap absen
            // $absen = Absen::where('guru_id', Auth::guard('guru')->user()->id)
            //     ->where('jadwal_id', $jadwal->id)
            //     ->whereDate('created_at', now())
            //     ->first();

            return view('frontend.siswa.kelas', compact(
                'ruangan',
                'jadwal',
                'absens',
                'count',
                'absen_alpha_total',
                'absen_izin_total',
                'absen_sakit_total',
                'counthariini_sakit',
                'counthariini_alpa',
                'counthariini_izin',
                'hariini',
                'tugas_hari_ini',
                'semua_tugas',
                'hadir',
                'total_hadir_siswa',
                'tugas_hari_ini_tampil',
                'materi_hari_ini',
                'materi_hari_ini_tampil',
                'semua_tugas_tampil',
                'semua_materi_tampil',
                'hadir_count',
                'total_hadir',
                'hitung_absen',
                'semua_tugas_tampil_tampil',
                'checkabsen'
            ));
        }
    }

    public function absen(Request $request, $id)
    {
        // $hariini = \Carbon\Carbon::now()->format('Y-m-d');
        $booking = Absens::findOrFail($id);
        $booking['status'] = $request->status;
        $booking->save();
        return back()->with('success', 'anda berhasil absen');
    }


    public function ambil_tugas($id)
    {
        $tugas = Tugas::where('id', $id)->first();
        // $ambil_tugas = Nilai_tugas::where('tugas_id', $tugas->id)->get();
        // dd($tugas);
        return view('frontend.siswa.tugas', compact('ambil_tugas'));
    }

    public function jawaban_siswa(Request $request, $id)
    {
        $booking = Nilai_tugas::findOrFail($id);
        $booking['jawaban_siswa'] = $request->jawaban_siswa;
        $booking->save();
        return back()->with('success', 'berhasi mengirim jawaban');
    }

    public function get_jawaban_siswa(Request $request, $id)
    {
        // $id = $request->id;
        $nilai_tugas = Nilai_tugas::find($id);
        // return response()->json($nilai_tugas);
        return view('frontend.siswa.jawaban', compact('nilai_tugas'));

        // dd($nilai_tugas);
    }
}
