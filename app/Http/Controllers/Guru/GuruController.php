<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Absens;
use App\Models\Jadwal;
use App\Models\Materi;
use App\Models\Nilai_tugas;
use App\Models\Nilai_Ujian;
use App\Models\Nilai_Ulangan;
use App\Models\Pertemuan;
use App\Models\Raport;
use App\Models\Ruangan;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\Ujian;
use App\Models\Ulangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function index()
    {
        return view('frontend.guru.index');
    }

    public function jadwalMengajar()
    {
        $jadwals = Jadwal::with('mata_pelajaran', 'hari', 'guru')->where('guru_id', Auth::guard('guru')->user()->id)->get();

        return view('frontend.guru.jadwal', [
            'jadwals' => $jadwals,
        ]);
    }

    // public function semua_tugas(Request $request)
    // {
    //     $semua_tugas = Tugas::with('jadwal')->where('jadwal_id', $request->jadwal_id)->get();
    //     return view('frontend.guru.semua_tugas', compact('semua_tugas'));
    // }
    public function raport_create(Request $request)
    {
        // $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
        $dataSiswa = Ruangan::all();


        foreach ($dataSiswa as $p) {

            $raport =   Raport::create([
                'nilai_tugas' => null,
                'nilai_ulangan' => null,
                'nilai_ujian' => null,
                'nilai_raport' => null,
                'semester' => $request->semester,
                'siswa_id' => $p->siswa_id,
                'kelas_id' => $p->kelas_id,
                'tahun_ajaran' => $request->tahun_ajaran,
            ]);
            // dd($raport);
        }



        return back()->with('success', 'tugas berhasil di buat');
    }

    public function tugas(Request $request)
    {

        if ($request->file('file_or_link')) {
            //simpan foto produk yang di upload ke direkteri public/storage/file_or_linkproduct
            $file = $request->file('file_or_link')->store('images', 'public');

            $tugas = [
                'judul' => $request->judul,
                'type' => $request->type,
                'description' => $request->description,
                'pengumpulan' => $request->pengumpulan,
                'file_or_link' => $file,
                'jadwal_id' => $request->jadwal_id,
                'tanggal' => $request->tanggal,
                'semester' => $request->semester,
                'kelas_id' => $request->kelas_id,
                'tahun_ajaran' => $request->tahun_ajaran
            ];

            $ambil_tugas = Tugas::create($tugas);
            $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
            $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();


            foreach ($dataSiswa as $p) {
                Nilai_tugas::create([
                    'tugas_id' => $ambil_tugas['id'],
                    'siswa_id' => $p->siswa_id,
                    'jadwal_id' => $datajadwal->id,
                    'tanggal' => $ambil_tugas->tanggal,
                    'guru_id' => $request->guru_id,
                    'pertemuan' => $ambil_tugas->pertemuan,
                    'semester' => $ambil_tugas->semester,
                    'kelas_id' => $ambil_tugas->kelas_id,
                    'tahun_ajaran' => $ambil_tugas->tahun_ajaran
                ]);
            }
            return back()->with('success', 'tugas berhasil di buat');
        }

        $tugas = [
            'judul' => $request->judul,
            'type' => $request->type,
            'description' => $request->description,
            'pengumpulan' => $request->pengumpulan,
            'file_or_link' => $request->file_or_link,
            'jadwal_id' => $request->jadwal_id,
            'tanggal' => $request->tanggal,
            'pertemuan' => $request->pertemuan,
            'semester' => $request->semester,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran' => $request->tahun_ajaran
        ];

        if ($tugas) {
            $ambil_tugas = Tugas::create($tugas);
            $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
            $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();


            foreach ($dataSiswa as $p) {
                Nilai_tugas::create([
                    'tugas_id' => $ambil_tugas['id'],
                    'siswa_id' => $p->siswa_id,
                    'jadwal_id' => $datajadwal->id,
                    'tanggal' => $ambil_tugas->tanggal,
                    'guru_id' => $request->guru_id,
                    'pertemuan' => $ambil_tugas->pertemuan,
                    'semester' => $ambil_tugas->semester,
                    'kelas_id' => $ambil_tugas->kelas_id,
                    'tahun_ajaran' => $ambil_tugas->tahun_ajaran
                ]);
            }



            return back()->with('success', 'tugas berhasil di buat');
        }

        return back()->with('error', 'tugas gagal di buat');
    }

    public function ulangan(Request $request)
    {

        if ($request->file('file_or_link')) {
            //simpan foto produk yang di upload ke direkteri public/storage/file_or_linkproduct
            $file = $request->file('file_or_link')->store('images', 'public');

            $tugas = [
                'judul' => $request->judul,
                'type' => $request->type,
                'description' => $request->description,
                'pengumpulan' => $request->pengumpulan,
                'file_or_link' => $file,
                'jadwal_id' => $request->jadwal_id,
                'tanggal' => $request->tanggal,
                'semester' => $request->semester,
                'kelas_id' => $request->kelas_id,
                'tahun_ajaran' => $request->tahun_ajaran
            ];

            $ambil_tugas = Ulangan::create($tugas);
            $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
            $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();


            foreach ($dataSiswa as $p) {
                Nilai_Ulangan::create([
                    'ulangan_id' => $ambil_tugas['id'],
                    'siswa_id' => $p->siswa_id,
                    'jadwal_id' => $datajadwal->id,
                    'tanggal' => $ambil_tugas->tanggal,
                    'guru_id' => $request->guru_id,
                    'pertemuan' => $ambil_tugas->pertemuan,
                    'semester' => $ambil_tugas->semester,
                    'kelas_id' => $ambil_tugas->kelas_id,
                    'tahun_ajaran' => $ambil_tugas->tahun_ajaran
                ]);
            }
            return back()->with('success', 'tugas berhasil di buat');
        }

        $tugas = [
            'judul' => $request->judul,
            'type' => $request->type,
            'description' => $request->description,
            'pengumpulan' => $request->pengumpulan,
            'file_or_link' => $request->file_or_link,
            'jadwal_id' => $request->jadwal_id,
            'tanggal' => $request->tanggal,
            'pertemuan' => $request->pertemuan,
            'semester' => $request->semester,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran' => $request->tahun_ajaran
        ];

        if ($tugas) {
            $ambil_tugas = Ulangan::create($tugas);
            $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
            $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();


            foreach ($dataSiswa as $p) {
                Nilai_Ulangan::create([
                    'ulangan_id' => $ambil_tugas['id'],
                    'siswa_id' => $p->siswa_id,
                    'jadwal_id' => $datajadwal->id,
                    'tanggal' => $ambil_tugas->tanggal,
                    'guru_id' => $request->guru_id,
                    'pertemuan' => $ambil_tugas->pertemuan,
                    'semester' => $ambil_tugas->semester,
                    'kelas_id' => $ambil_tugas->kelas_id,
                    'tahun_ajaran' => $ambil_tugas->tahun_ajaran
                ]);
            }



            return back()->with('success', 'tugas berhasil di buat');
        }

        return back()->with('error', 'tugas gagal di buat');
    }

    public function ujian(Request $request)
    {

        if ($request->file('file_or_link')) {
            //simpan foto produk yang di upload ke direkteri public/storage/file_or_linkproduct
            $file = $request->file('file_or_link')->store('images', 'public');

            $tugas = [
                'judul' => $request->judul,
                'type' => $request->type,
                'description' => $request->description,
                'pengumpulan' => $request->pengumpulan,
                'file_or_link' => $file,
                'jadwal_id' => $request->jadwal_id,
                'tanggal' => $request->tanggal,
                'semester' => $request->semester,
                'kelas_id' => $request->kelas_id,
                'tahun_ajaran' => $request->tahun_ajaran
            ];

            $ambil_tugas = Ujian::create($tugas);
            $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
            $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();


            foreach ($dataSiswa as $p) {
                Nilai_Ujian::create([
                    'ujian_id' => $ambil_tugas['id'],
                    'siswa_id' => $p->siswa_id,
                    'jadwal_id' => $datajadwal->id,
                    'tanggal' => $ambil_tugas->tanggal,
                    'guru_id' => $request->guru_id,
                    'pertemuan' => $ambil_tugas->pertemuan,
                    'semester' => $ambil_tugas->semester,
                    'kelas_id' => $ambil_tugas->kelas_id,
                    'tahun_ajaran' => $ambil_tugas->tahun_ajaran
                ]);
            }
            return back()->with('success', 'tugas berhasil di buat');
        }

        $tugas = [
            'judul' => $request->judul,
            'type' => $request->type,
            'description' => $request->description,
            'pengumpulan' => $request->pengumpulan,
            'file_or_link' => $request->file_or_link,
            'jadwal_id' => $request->jadwal_id,
            'tanggal' => $request->tanggal,
            'pertemuan' => $request->pertemuan,
            'semester' => $request->semester,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran' => $request->tahun_ajaran
        ];

        if ($tugas) {
            $ambil_tugas = Ujian::create($tugas);
            $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
            $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();


            foreach ($dataSiswa as $p) {
                Nilai_Ujian::create([
                    'ujian_id' => $ambil_tugas['id'],
                    'siswa_id' => $p->siswa_id,
                    'jadwal_id' => $datajadwal->id,
                    'tanggal' => $ambil_tugas->tanggal,
                    'guru_id' => $request->guru_id,
                    'pertemuan' => $ambil_tugas->pertemuan,
                    'semester' => $ambil_tugas->semester,
                    'kelas_id' => $ambil_tugas->kelas_id,
                    'tahun_ajaran' => $ambil_tugas->tahun_ajaran
                ]);
            }



            return back()->with('success', 'tugas berhasil di buat');
        }

        return back()->with('error', 'tugas gagal di buat');
    }

    public function buat_absen(Request $request)
    {
        $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
        $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();

        $hariini = \Carbon\Carbon::now()->format('Y-m-d');
        // $absen = Absens::where('jadwal_id', $datajadwal->id)->where('kelas_id', $datajadwal->kelas_id)->first();

        // if ($absen->pertemuan > $request->pertemuan) {
        // for ($i = 1; $i; $i++) {
        $pertemuan = [
            'kelas_id' => $request->kelas_id,
            'jadwal_id' => $datajadwal->id,
            'pertemuan' => $request->pertemuan
        ];
        // }

        $create = Pertemuan::create($pertemuan);
      
        foreach ($dataSiswa as $p) {
                Absens::create([
                    'status' => null,
                    'siswa_id' => $p->siswa_id,
                    'jadwal_id' => $datajadwal->id,
                'tanggal' => $request->tanggal,
                'pertemuan' => $create->pertemuan,
                'semester' => $request->semester,
                'kelas_id' => $request->kelas_id,
                'tahun_ajaran' => $request->tahun_ajaran
                ]);
            // }
        }
        return back()->with('success', 'tugas berhasil di buat');
        // return back()->with('error', 'anda sudah membuat absens');
    }

    public function materi(Request $request)
    { {

            if ($request->file('file_or_link')) {
                //simpan foto produk yang di upload ke direkteri public/storage/file_or_linkproduct
                $file = $request->file('file_or_link')->store('images', 'public');

                $materi = [
                    'judul' => $request->judul,
                    'type' => $request->type,
                    'description' => $request->description,
                    'file_or_link' => $file,
                    'jadwal_id' => $request->jadwal_id,
                    'tanggal' => $request->tanggal,
                    'pertemuan' => $request->pertemuan,
                    'kelas_id' => $request->kelas_id,
                    'tahun_ajaran' => $request->tahun_ajaran
                ];

                Materi::create($materi);
                return back()->with('success', 'Materi berhasil di buat');
            }

            $materi = [
                'judul' => $request->judul,
                'type' => $request->type,
                'description' => $request->description,
                'file_or_link' => $request->file_or_link,
                'jadwal_id' => $request->jadwal_id,
                'tanggal' => $request->tanggal,
                'pertemuan' => $request->pertemuan,
                'kelas_id' => $request->kelas_id,
                'tahun_ajaran' => $request->tahun_ajaran
            ];

            if ($materi) {
                Materi::create($materi);
                return back()->with('success', 'Materi berhasil di buat');
            }

            return back()->with('error', 'Materi gagal di buat');
        }
    }

    public function create($id)
    {
        $jadwalId = decrypt($id);
        $jadwal = Jadwal::where('id', $jadwalId)
            ->where('guru_id', Auth::guard('guru')->user()->id)
            ->first();

        return view('frontend.guru.meteri', compact('jadwal'));
    }

    public function cari_tugas_filter(Request $request, $id)
    {

        // $jadwal = Jadwal::with(['kelas'], ['guru'], ['mata_pelajaran'])->where('id', decrypt($id))->first();

        $jadwal = Jadwal::with(['kelas'], ['guru'], ['mata_pelajaran'])->where('id', decrypt($id))->first();
        $semua_tugas_tampil = DB::table('nilai_tugas')
        ->leftjoin('tugas', 'nilai_tugas.tugas_id', '=', 'tugas.id')
        ->leftjoin('siswa', 'nilai_tugas.siswa_id', '=', 'siswa.id')
        ->leftjoin('kelas', 'nilai_tugas.kelas_id', '=', 'kelas.id')
        ->select(
            'siswa.name as siswa_name',
            'siswa.nisn as siswa_nisn',
            'kelas.kelas as kelas',
            'tugas.judul as judul',
            'tugas.type as type',
            'tugas.pengumpulan as pengumpulan',
            'tugas.file_or_link as file_or_link',
            'tugas.description as description',
            'nilai_tugas.jawaban_siswa as jawaban_siswa',
            'nilai_tugas.nilai as nilai',
            'nilai_tugas.semester as semester',
            'nilai_tugas.komentar_guru as komentar_guru',
            'nilai_tugas.tanggal as tanggal_tugas',
            'nilai_tugas.pertemuan as pertemuan',
            'nilai_tugas.tahun_ajaran as tahun_ajaran',
            'nilai_tugas.created_at as created_at',
            'nilai_tugas.id as id',
        )
            ->where('nilai_tugas.jadwal_id', $jadwal->id)
            ->where('nilai_tugas.semester', 'like', '%' . $request->semester . '%')
            ->where('nilai_tugas.tahun_ajaran', 'like', '%' . $request->tahun_ajaran . '%')
            ->groupBy(
                'siswa.name',
                'siswa.nisn',
                'kelas.kelas',
                'tugas.judul',
                'tugas.type',
                'tugas.file_or_link',
                'tugas.description',
                'nilai_tugas.jawaban_siswa',
                'nilai_tugas.nilai',
                'nilai_tugas.semester',
                'nilai_tugas.komentar_guru',
                'nilai_tugas.tanggal',
                'nilai_tugas.pertemuan',
                'nilai_tugas.tahun_ajaran',
                'tugas.pengumpulan',
                'nilai_tugas.created_at',
                'nilai_tugas.id',
            )
            ->limit(10)
            ->orderBy('nilai', 'desc')
            ->get();

        return view('frontend.guru.raport.cari_tugas_filter', compact('semua_tugas_tampil', 'jadwal'));
    }

    public function masuk(Request $request, $id)
    {
        //parameter $jadwalId adalah id dari jadwal yang sudah di encrypt
        //dan kode dibawah untuk mencari jadwal dari param $jadwalId sekalian di decrypt var $jadwalId nya
        $jadwal = Jadwal::with(['kelas'], ['guru'], ['mata_pelajaran'])->where('id', decrypt($id))->first();
        // $ruangan = Ruangan::with('siswa')->where('siswa_id', $jadwal->ruangan->siswa->id)->get();
        // $ruangan = Ruangan::with('siswa')->where('kelas_id', $jadwal->kelas->id)->get();
        $absencheck = Absens::with('siswa')->where('jadwal_id', $jadwal->id)->where('status', null)->get();
        $absencheckget = Absens::with('siswa')->where('jadwal_id', $jadwal->id)->where('status', null)->get();

        $checkabsen = Absens::where('jadwal_id', $jadwal->id)->first();

        $semester = Semester::all();

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
            $ulangan_hari_ini = Ulangan::with('jadwal')->where('jadwal_id', $jadwal->id)->where(
                'tanggal',
                $hariini
            )->count();
            $ujian_hari_ini = Ujian::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->count();
            $tugas_hari_ini_tampil = Tugas::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->get();

            $semua_tugas = Tugas::with('jadwal')->where('jadwal_id', $jadwal->id)->count();
            $semua_ulangan = Ulangan::with('jadwal')->where('jadwal_id', $jadwal->id)->count();
            $semua_ujian = Ujian::with('jadwal')->where('jadwal_id', $jadwal->id)->count();
            // $semua_tugas_tampil = Tugas::with('jadwal')->where('jadwal_id', $jadwal->id)->get();

            $semua_materi_tampil = Materi::with('jadwal')->where('jadwal_id', $jadwal->id)->get();
            $semua_materi_tampil_count = Materi::with('jadwal')->where('jadwal_id', $jadwal->id)->count();



            $materi_hari_ini = Materi::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->count();


            $hadir_count = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'hadir')->where('tanggal', $hariini)->count('siswa_id');


            $count = Ruangan::with('siswa')->where('kelas_id', $jadwal->kelas->id)->count('siswa_id');
            $sakit = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status',  'sakit')->where('tanggal', $hariini)->count('siswa_id');
            $izin = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status',  'izin')->where('tanggal', $hariini)->count('siswa_id');
            $alpa = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status', 'alpa')->where('tanggal', $hariini)->count('siswa_id');

            $pp = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status',  'hadir')->where('tanggal', $hariini)->count('siswa_id');

            $hitung_absen = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('status', '!=', 'hadir')->where('tanggal', $hariini)->count('siswa_id');

            // $semua_tugas_tampil = Nilai_tugas::with('tugas')->where('jadwal_id', $jadwal->id)->where('guru_id', Auth::guard('guru')->user()->id)->get();
            // $semua_tugas_tampil = Nilai_tugas::with('tugas')->where('jadwal_id', $jadwal->id)->where('guru_id',Auth::guard('guru')->user()->id )->get();
            // $semua_tugas_tampil = Nilai_tugas::with('tugas')->where('jadwal_id', $jadwal->id)->where('guru_id', Auth::guard('guru')->user()->id)->get();
            // $semua_ulangan_tampil = Nilai_Ulangan::with('ulangan')->where('jadwal_id', $jadwal->id)->where(
            //     'guru_id',
            //     Auth::guard('guru')->user()->id
            // )->get();

            $semua_ujian_tampil = DB::table('nilai_ujian')
            ->leftjoin('ujian', 'nilai_ujian.ujian_id', '=', 'ujian.id')
            ->leftjoin(
                'siswa',
                'nilai_ujian.siswa_id',
                '=',
                'siswa.id'
            )
            ->leftjoin('kelas', 'nilai_ujian.kelas_id', '=', 'kelas.id')
            ->where(
                'nilai_ujian.jadwal_id',
                $jadwal->id
            )
                ->where('guru_id', Auth::guard('guru')->user()->id)
                ->select(
                    'siswa.name as siswa_name',
                    'siswa.nisn as siswa_nisn',
                    'kelas.kelas as kelas',
                    'ujian.judul as judul',
                    'ujian.type as type',
                    'ujian.pengumpulan as pengumpulan',
                    'ujian.file_or_link as file_or_link',
                    'ujian.description as description',
                    'nilai_ujian.jawaban_siswa as jawaban_siswa',
                    'nilai_ujian.nilai as nilai',
                    'nilai_ujian.semester as semester',
                    'nilai_ujian.komentar_guru as komentar_guru',
                    'nilai_ujian.tanggal as tanggal_ujian',
                    'nilai_ujian.pertemuan as pertemuan',
                    'nilai_ujian.tahun_ajaran as tahun_ajaran',
                    'nilai_ujian.created_at as created_at',
                    'nilai_ujian.id as id',
                )
                ->groupBy(
                    'siswa.name',
                    'siswa.nisn',
                    'kelas.kelas',
                    'ujian.judul',
                    'ujian.type',
                    'ujian.file_or_link',
                    'ujian.description',
                    'nilai_ujian.jawaban_siswa',
                    'nilai_ujian.nilai',
                    'nilai_ujian.semester',
                    'nilai_ujian.komentar_guru',
                    'nilai_ujian.tanggal',
                    'nilai_ujian.pertemuan',
                    'nilai_ujian.tahun_ajaran',
                    'ujian.pengumpulan',
                    'nilai_ujian.created_at',
                    'nilai_ujian.id',
                )
                ->limit(10)
                ->orderBy('nilai', 'desc')
                ->get();

            $semua_ulangan_tampil = DB::table('nilai_ulangan')
            ->leftjoin('ulangan', 'nilai_ulangan.ulangan_id', '=', 'ulangan.id')
            ->leftjoin(
                'siswa',
                'nilai_ulangan.siswa_id',
                '=',
                'siswa.id'
            )
            ->leftjoin(
                'kelas',
                'nilai_ulangan.kelas_id',
                '=',
                'kelas.id'
            )
            ->where(
                'nilai_ulangan.jadwal_id',
                $jadwal->id
            )
                ->where('guru_id', Auth::guard('guru')->user()->id)
                ->select(
                    'siswa.name as siswa_name',
                    'siswa.nisn as siswa_nisn',
                    'kelas.kelas as kelas',
                    'ulangan.judul as judul_ulangan',
                    'ulangan.type as type',
                    'ulangan.pengumpulan as pengumpulan',
                    'ulangan.file_or_link as file_or_link',
                    'ulangan.description as description',
                    'nilai_ulangan.jawaban_siswa as jawaban_siswa',
                    'nilai_ulangan.nilai as nilai',
                    'nilai_ulangan.semester as semester',
                    'nilai_ulangan.komentar_guru as komentar_guru',
                    'nilai_ulangan.tanggal as tanggal_ulangan',
                    'nilai_ulangan.pertemuan as pertemuan',
                    'nilai_ulangan.tahun_ajaran as tahun_ajaran',
                    'nilai_ulangan.created_at as created_at',
                    'nilai_ulangan.id as id',
                )
                ->groupBy(
                    'siswa.name',
                    'siswa.nisn',
                    'kelas.kelas',
                    'ulangan.judul',
                    'ulangan.type',
                    'ulangan.file_or_link',
                    'ulangan.description',
                    'nilai_ulangan.jawaban_siswa',
                    'nilai_ulangan.nilai',
                    'nilai_ulangan.semester',
                    'nilai_ulangan.komentar_guru',
                    'nilai_ulangan.tanggal',
                    'nilai_ulangan.pertemuan',
                    'nilai_ulangan.tahun_ajaran',
                    'ulangan.pengumpulan',
                    'nilai_ulangan.created_at',
                    'nilai_ulangan.id',
                )
                ->limit(10)
                ->orderBy('nilai', 'desc')
                ->get();

            $semua_tugas_tampil = DB::table('nilai_tugas')
                ->leftjoin('tugas', 'nilai_tugas.tugas_id', '=', 'tugas.id')
                ->leftjoin('siswa', 'nilai_tugas.siswa_id', '=', 'siswa.id')
                ->leftjoin('kelas', 'nilai_tugas.kelas_id', '=', 'kelas.id')
                ->where('nilai_tugas.jadwal_id', $jadwal->id)
            ->where('guru_id', Auth::guard('guru')->user()->id)
            ->select(
                'siswa.name as siswa_name',
                'siswa.nisn as siswa_nisn',
                'kelas.kelas as kelas',
                'tugas.judul as judul',
                'tugas.type as type',
                'tugas.pengumpulan as pengumpulan',
                'tugas.file_or_link as file_or_link',
                'tugas.description as description',
                'nilai_tugas.jawaban_siswa as jawaban_siswa',
                'nilai_tugas.nilai as nilai',
                'nilai_tugas.semester as semester',
                'nilai_tugas.komentar_guru as komentar_guru',
                'nilai_tugas.tanggal as tanggal_tugas',
                'nilai_tugas.pertemuan as pertemuan',
                'nilai_tugas.tahun_ajaran as tahun_ajaran',
                'nilai_tugas.created_at as created_at',
                'nilai_tugas.id as id',
            )
            ->groupBy(
                'siswa.name',
                'siswa.nisn',
                'kelas.kelas',
                'tugas.judul',
                'tugas.type',
                'tugas.file_or_link',
                'tugas.description',
                'nilai_tugas.jawaban_siswa',
                'nilai_tugas.nilai',
                'nilai_tugas.semester',
                'nilai_tugas.komentar_guru',
                'nilai_tugas.tanggal',
                'nilai_tugas.pertemuan',
                'nilai_tugas.tahun_ajaran',
                'tugas.pengumpulan',
                'nilai_tugas.created_at',
                'nilai_tugas.id',
            )
            ->limit(10)
            ->orderBy('nilai', 'desc')
            ->get();

            $tugas_tampil_hari_ini = DB::table('nilai_tugas')
            ->leftjoin('tugas', 'nilai_tugas.tugas_id', '=', 'tugas.id')
            ->leftjoin(
                'siswa',
                'nilai_tugas.siswa_id',
                '=',
                'siswa.id'
            )
            ->leftjoin(
                'kelas',
                'nilai_tugas.kelas_id',
                '=',
                'kelas.id'
            )
            ->where(
                'nilai_tugas.jadwal_id',
                $jadwal->id
            )
            ->where('nilai_tugas.guru_id', Auth::guard('guru')->user()->id)
            ->where(
                'nilai_tugas.tanggal',
                $hariini
            )
                ->select(
                    'siswa.name as siswa_name',
                    'siswa.nisn as siswa_nisn',
                    'kelas.kelas as kelas',
                    'tugas.judul as judul',
                    'tugas.type as type',
                    'tugas.pengumpulan as pengumpulan',
                    'tugas.file_or_link as file_or_link',
                    'tugas.description as description',
                    'nilai_tugas.jawaban_siswa as jawaban_siswa',
                    'nilai_tugas.nilai as nilai',
                    'nilai_tugas.semester as semester',
                    'nilai_tugas.komentar_guru as komentar_guru',
                    'nilai_tugas.tanggal as tanggal_tugas',
                    'nilai_tugas.pertemuan as pertemuan',
                    'nilai_tugas.tahun_ajaran as tahun_ajaran',
                    'nilai_tugas.created_at as created_at',
                    'nilai_tugas.id as id',
                )
                ->groupBy(
                    'siswa.name',
                    'siswa.nisn',
                    'kelas.kelas',
                    'tugas.judul',
                    'tugas.type',
                    'tugas.file_or_link',
                    'tugas.description',
                    'nilai_tugas.jawaban_siswa',
                    'nilai_tugas.nilai',
                    'nilai_tugas.semester',
                    'nilai_tugas.komentar_guru',
                    'nilai_tugas.tanggal',
                    'nilai_tugas.pertemuan',
                    'nilai_tugas.tahun_ajaran',
                    'tugas.pengumpulan',
                    'nilai_tugas.created_at',
                    'nilai_tugas.id',
                )
                ->limit(10)
                ->orderBy('nilai', 'desc')
                ->get();

            $ulangan_tampil_hari_ini = DB::table('nilai_ulangan')
            ->leftjoin(
                'ulangan',
                'nilai_ulangan.ulangan_id',
                '=',
                'ulangan.id'
            )
            ->leftjoin(
                'siswa',
                'nilai_ulangan.siswa_id',
                '=',
                'siswa.id'
            )
            ->leftjoin(
                'kelas',
                'nilai_ulangan.kelas_id',
                '=',
                'kelas.id'
            )
                ->where(
                    'nilai_ulangan.jadwal_id',
                    $jadwal->id
                )
                ->where(
                    'nilai_ulangan.guru_id',
                    Auth::guard('guru')->user()->id
                )
                ->where(
                    'nilai_ulangan.tanggal',
                    $hariini
                )
                ->select(
                    'siswa.name as siswa_name',
                    'siswa.nisn as siswa_nisn',
                    'kelas.kelas as kelas',
                    'ulangan.judul as judul',
                    'ulangan.type as type',
                    'ulangan.pengumpulan as pengumpulan',
                    'ulangan.file_or_link as file_or_link',
                    'ulangan.description as description',
                    'nilai_ulangan.jawaban_siswa as jawaban_siswa',
                    'nilai_ulangan.nilai as nilai',
                    'nilai_ulangan.semester as semester',
                    'nilai_ulangan.komentar_guru as komentar_guru',
                    'nilai_ulangan.tanggal as tanggal_ulangan',
                    'nilai_ulangan.pertemuan as pertemuan',
                    'nilai_ulangan.tahun_ajaran as tahun_ajaran',
                    'nilai_ulangan.created_at as created_at',
                    'nilai_ulangan.id as id',
                )
                ->groupBy(
                    'siswa.name',
                    'siswa.nisn',
                    'kelas.kelas',
                    'ulangan.judul',
                    'ulangan.type',
                    'ulangan.file_or_link',
                    'ulangan.description',
                    'nilai_ulangan.jawaban_siswa',
                    'nilai_ulangan.nilai',
                    'nilai_ulangan.semester',
                    'nilai_ulangan.komentar_guru',
                    'nilai_ulangan.tanggal',
                    'nilai_ulangan.pertemuan',
                    'nilai_ulangan.tahun_ajaran',
                    'ulangan.pengumpulan',
                    'nilai_ulangan.created_at',
                    'nilai_ulangan.id',
                )
                ->limit(10)
                ->orderBy('nilai', 'desc')
                ->get();


            $ujian_tampil_hari_ini = DB::table('nilai_ujian')
            ->leftjoin('ujian', 'nilai_ujian.ujian_id', '=', 'ujian.id')
            ->leftjoin(
                'siswa',
                'nilai_ujian.siswa_id',
                '=',
                'siswa.id'
            )
            ->leftjoin(
                'kelas',
                'nilai_ujian.kelas_id',
                '=',
                'kelas.id'
            )
            ->where(
                'nilai_ujian.jadwal_id',
                $jadwal->id
            )
            ->where('nilai_ujian.guru_id', Auth::guard('guru')->user()->id)
            ->where(
                'nilai_ujian.tanggal',
                $hariini
            )
                ->select(
                    'siswa.name as siswa_name',
                    'siswa.nisn as siswa_nisn',
                    'kelas.kelas as kelas',
                    'ujian.judul as judul',
                    'ujian.type as type',
                    'ujian.pengumpulan as pengumpulan',
                    'ujian.file_or_link as file_or_link',
                    'ujian.description as description',
                    'nilai_ujian.jawaban_siswa as jawaban_siswa',
                    'nilai_ujian.nilai as nilai',
                    'nilai_ujian.semester as semester',
                    'nilai_ujian.komentar_guru as komentar_guru',
                    'nilai_ujian.tanggal as tanggal_ujian',
                    'nilai_ujian.pertemuan as pertemuan',
                    'nilai_ujian.tahun_ajaran as tahun_ajaran',
                    'nilai_ujian.created_at as created_at',
                    'nilai_ujian.id as id',
                )
                ->groupBy(
                    'siswa.name',
                    'siswa.nisn',
                    'kelas.kelas',
                    'ujian.judul',
                    'ujian.type',
                    'ujian.file_or_link',
                    'ujian.description',
                    'nilai_ujian.jawaban_siswa',
                    'nilai_ujian.nilai',
                    'nilai_ujian.semester',
                    'nilai_ujian.komentar_guru',
                    'nilai_ujian.tanggal',
                    'nilai_ujian.pertemuan',
                    'nilai_ujian.tahun_ajaran',
                    'ujian.pengumpulan',
                    'nilai_ujian.created_at',
                    'nilai_ujian.id',
                )
                ->limit(10)
                ->orderBy('nilai', 'desc')
                ->get();

            $materi_hari_ini_tampil = Materi::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->get();
            // $semua_ujian_tampil = Nilai_ujian::with('ujian')->where('jadwal_id', $jadwal->id)->get();

            // $tugas_tampil_hari_ini = Nilai_tugas::with('tugas')->where('jadwal_id', $jadwal->id)->where('guru_id', Auth::guard('guru')->user()->id)->get();

            $tugas_pertemuan = Nilai_tugas::where('jadwal_id', $jadwal->id)->count('pertemuan');


            $total = $sakit + $izin + $alpa + $pp;

            $hadir = Absens::with('jadwal')->where('jadwal_id', $jadwal->id)->where('tanggal', $hariini)->where('status', '!=', null)->get();
            $siswa_belum_absens = Absens::with('siswa')->where('jadwal_id', $jadwal->id)->where('status', null)->where('tanggal', $hariini)->get();


            // $get = Ruangan::with('siswa')->where('kelas_id', $jadwal->kelas->id)->count('siswa_id');


            // @foreach($get as $p)
            //     @if($p->id !== )
            // @endforeach

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
            $absens_semester = DB::table('absens')
            ->select(
                'absens.semester as semesters',
                'absens.tahun_ajaran as tahun_ajaran',
            )
                ->groupBy('absens.semester', 'absens.tahun_ajaran')
                ->limit(10)
                ->orderBy('semester', 'desc')
                ->distinct()
                ->get();


            // $latest = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->count('pertemuan');
            
            $check = Absens::with('siswa', 'jadwal')->where('jadwal_id', $jadwal->id)->count('siswa_id');

            return view('frontend.guru.kelas', compact(
                'absencheck',
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
                'ulangan_hari_ini',
                'ujian_hari_ini',
                'semua_tugas',
                'semua_ulangan',
                'semua_ujian',
                'hadir',
                'total_hadir_siswa',
                'pp',
                'tugas_hari_ini_tampil',
                'materi_hari_ini',
                'materi_hari_ini_tampil',
                'semua_tugas_tampil',
                'semua_ulangan_tampil',
                'semua_ujian_tampil',
                'semua_materi_tampil',
                'check',
                'hadir_count',
                'total_hadir',
                'hitung_absen',
                'tugas_tampil_hari_ini',
                'ulangan_tampil_hari_ini',
                'ujian_tampil_hari_ini',
                'absencheckget',
                'checkabsen',
                'siswa_belum_absens',
                'tugas_pertemuan',
                'semua_materi_tampil_count',
                'semester'
                // 'latest',
                // 'siswa_hadir'
                // 'mahasiswaHadir',
                // 'mahasiswaTidakHadir'
            ));
        }

        // Jika waktu pada jadwal tidak sesuai return back
        return back();
    }

    public function storeAbsen(Request $request, $id)
    {
        $booking = Absens::findOrFail($id);
        $booking['status'] = $request->status;
        if ($booking) {
            $booking->save();
            return back()->with('success', 'anda berhasil absen');
        }
        return back()->with('error', 'gagal');
    }

    public function storeAbsenget($id)
    {

        // $jadwal = Jadwal::with(['kelas'], ['guru'], ['mata_pelajaran'])->where('id', decrypt($id))->first();
        $absens = Absens::FindOrFail($id);
        // return response()->json($absens);
        return view('frontend.guru.absens', compact('absens'));
    }

    public function kasih_nilai($id)
    {
        $nilai_tugas =  Nilai_tugas::where('tugas_id', $id)->get();
        return view('frontend.guru.ambil_nilai', compact('nilai_tugas'));
    }

    public function get_jawaban_siswa_nilai(Request $request, $id)
    {
        $nilai_tugas_siswa = Nilai_tugas::FindOrFail($id);
        return view('frontend.guru.jawaban', compact('nilai_tugas_siswa'));
    }

    public function jawaban_siswa_nilai(Request $request, $id)
    {
        $booking = Nilai_tugas::findOrFail($id);
        $booking['nilai'] = $request->nilai;
        $booking['komentar_guru'] = $request->komentar_guru;
        $booking->save();
        return back()->with('success', 'berhasi mengirim nilai');
    }






    // public function create_absensi($id)
    // {
    //     $jadwal = Jadwal::with('hari')->findOrFail(decrypt($id));
    //     $kelasActive = Jadwal::with('guru')->where('guru_id', Auth::guard('guru')->user()->id)->where('hari_id', 5)->get();
    //     $absen = Absen::where('guru_id', Auth::guard('guru')->user()->id)
    //         ->where('jadwal_id', $jadwal->id)
    //         ->whereDate('created_at', now())
    //         ->first();
    //     return view('frontend.guru.absensi-create', compact('kelasActive', 'jadwal', 'absen'));
    // }

    // public function store_absensi(Request $request)
    // {
    //     $jadwal_id = decrypt(request('jadwal'));

    //     request()->validate([
    //         'pertemuan' => 'required'
    //     ]);

    //     $absen = Absen::create([
    //         'jadwal_id' => $jadwal_id,
    //         'pertemuan' => request('pertemuan'),
    //         'rangkuman' => request('rangkuman'),
    //         'berita_acara' => request('berita_acara')
    //     ]);

    //     $mahasiswas = Siswa::where('ruangan_id', request('kelas'))->get();

    //     foreach ($mahasiswas as $mahasiswa) {
    //         Absen::create([
    //             'jadwal_id' => $jadwal_id,
    //             'parent' => $absen->id,
    //             'siswa_id' => $mahasiswa->id,
    //             'pertemuan' => $absen->pertemuan,
    //         ]);
    //     }

    //     session()->flash('success', 'Berhasil membuat absen hari ini');
    //     return redirect(route('kelas-masuk', request('jadwal')));
    // }
}
