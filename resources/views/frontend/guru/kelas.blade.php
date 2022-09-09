@extends('layouts.template_guru')
@section('contents')
<x-alert />
    <div class="row justify-content-center">
        <div class="card col-sm-12 col-lg-5">
            <div class="card-body">
                
                    <div class="row">
                        <div class="col mb-3 mb-lg-0 text-center">
                            <div>
                                <i data-feather="book-open" style="width: 80px; height: 60px; color: #6c757d"></i>
                                <div class="mt-2 font-weight-bold" style="color: #6c757d;">Materi</div>
                                    {{-- <h6 class="badge badge-dark">{{ $materi_hari_ini }}</h6><br> --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#materi">
                                        Buat
                                    </button>
                            </div>
                        </div>
                        <div class="col mb-3 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Tugas</div>
                            {{-- <h6 class="badge badge-dark">{{ $tugas_hari_ini }}</h6><br> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tugas">
                                Buat
                            </button>
                        </div>
                        <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Ulangan</div>
                            {{-- <h6 class="badge badge-dark">{{ $ulangan_hari_ini }}</h6><br> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ulangan">
                                Buat
                            </button>
                        </div>
                        <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Ujian</div>
                            {{-- <h6 class="badge badge-dark">{{ $ujian_hari_ini }}</h6><br> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ujian">
                                Buat
                            </button>
                        </div>
                        <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Absen</div>
                            {{-- <h6 class="badge badge-dark">!</h6><br> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#absenhariini">
                                Buat
                            </button>
                        </div>
                    </div><hr class="mt-2">
                    
                    <div class="row">
                        
                        <div class="col mb-3 mb-lg-0 text-center">
                            <i data-feather="book-open" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Semua Materi</div>
                                <h6 class="badge badge-dark">{{ $semua_materi_tampil_count }}</h6><br>
                                <!-- Button trigger modal -->
                                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#tampilsemuamateri" aria-expanded="false" aria-controls="tampilsemuamateri">
                                        Lihat
                                </button>
                        </div>

                        <div class="col mb-3 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Semua Tugas</div>
                                <h6 class="badge badge-dark">{{ $semua_tugas }}</h6><br>
                                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#tampilsemuatugas" aria-expanded="false" aria-controls="tampilsemuatugas">
                                    Lihat
                                </button>

                        </div>
                        <div class="col mb-3 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Semua Ulangan</div>
                            <h6 class="badge badge-dark">{{ $semua_ulangan }}</h6><br>
                            <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#tampilsemuaulangan" aria-expanded="false" aria-controls="tampilsemuaulangan">
                                Lihat
                            </button>
                        </div>
                        <div class="col mb-3 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Semua Ujian</div>
                            <h6 class="badge badge-dark">{{ $semua_ujian }}</h6><br>
                            <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#tampilsemuaujian" aria-expanded="false" aria-controls="tampilsemuaujian">
                               Lihat
                            </button>
                        </div>
                    </div><hr class="mt-2">

                    <div class="row">
                        
                         <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Materi Hari Ini</div>
                            <h6 class="badge badge-dark">{{ $materi_hari_ini }}</h6><br>
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#materihariini" aria-expanded="false" aria-controls="materihariini">
                                Lihat
                            </button>
                        </div>
                         <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Tugas Hari Ini</div>
                            <h6 class="badge badge-dark">{{ $tugas_hari_ini }}</h6><br>
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#tugashariini" aria-expanded="false" aria-controls="tugashariini">
                                Lihat
                            </button>
                        </div>
                        <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Ulangan Hari Ini</div>
                            <h6 class="badge badge-dark">{{ $ulangan_hari_ini }}</h6><br>
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#ulanganhariini" aria-expanded="false" aria-controls="ulanganhariini">
                                Lihat
                            </button>
                        </div>
                        <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Ujian Hari Ini</div>
                            <h6 class="badge badge-dark">{{ $ujian_hari_ini }}</h6><br>
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#ujianhariini" aria-expanded="false" aria-controls="ujianhariini">
                                Lihat
                            </button>
                        </div>
                        
                        <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Absensi Siswa</div>
                            <h6 class="badge badge-dark">{{ $hadir_count }}</h6><br>
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#absensi" aria-expanded="false" aria-controls="absensi">
                                Lihat
                            </button>
                        </div>
                        
                        <div class="col mb-2 mb-lg-0 text-center">
                            <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">belum absen</div>
                            <h6 class="badge badge-dark">{{ $total_hadir }}</h6><br>
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#belumabsensi" aria-expanded="false" aria-controls="belumabsensi">
                                Lihat
                            </button>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card col-sm-12 col-lg-6 mx-1">
            <div class="card-body">
                <div class="row">
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="users" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Total Siswa</div>
                        <h6 class="badge badge-dark">{{ $count }}</h6> Siswa
                    </div>
                    {{-- <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-check" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Absensi Keseluruhan 
                            <br>
                                                    @if($absen_izin_total !== null)
                                                       <h6 class="badge badge-dark">{{ $absen_izin_total }}</h6> siswa izin
                                                    @endif <br>
                                                     @if($absen_sakit_total !== null)
                                                        <h6 class="badge badge-dark">{{ $absen_sakit_total }}</h6> siswa sakit
                                                    @endif<br>
                                                     @if($absen_alpha_total !== null)
                                                        <h6 class="badge badge-dark">{{ $absen_alpha_total }}</h6> siswa alpa
                                                    @endif

                                                
                        </div>
                    </div>
                    
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-check" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Absensi hari ini 
                            <br>
                                                    @if($counthariini_izin !== null)
                                                       <h6 class="badge badge-dark">{{ $counthariini_izin }}</h6> siswa izin
                                                    @endif <br>
                                                     @if($counthariini_sakit !== null)
                                                       <h6 class="badge badge-dark">{{ $counthariini_sakit }}</h6> siswa sakit
                                                    @endif<br>
                                                     @if($counthariini_alpa !== null)
                                                        <h6 class="badge badge-dark">{{ $counthariini_alpa }}</h6> siswa alpa
                                                    @endif

                                                
                        </div>
                    </div> --}}
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-x" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">belum absensi</div>
                        <h6 class="badge badge-dark">{{ $total_hadir }}</h6> siswa
                    </div>

                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-x" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">siswa hadir</div>
                        <h6 class="badge badge-dark">{{ $hadir_count }}</h6> siswa
                    </div>
                    {{-- tugas_pertemuan --}}

                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-x" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Tidak Masuk</div>
                        <h6 class="badge badge-danger">{{ $hitung_absen }}</h6> siswa
                    </div>

                    {{-- <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-x" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">total pertemuan</div>
                        <h6 class="badge badge-danger">{{ $tugas_pertemuan }}</h6> siswa
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- tampil semua tugas --}}
    <div class="collapse mt-4" id="tampilsemuatugas">
        <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="{{ route('cari_tugas_filter', encrypt($jadwal->id)) }}" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                     @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    <div class="table-responsive">    
                                        <table class="table table-hover">
                                            <thead>
                                                <td>Nama Siswa</td>
                                                <td>NISN</td>
                                                <td>Judul</td>
                                                <td>Tugas</td>
                                                <td>description</td>
                                                <td>batas pengumpulan</td>
                                                <td>jawaban siswa</td>
                                                <td>nilai</td>
                                                <td>komentar guru</td>
                                                <td>tanggal pemberian tugas</td>
                                                <td>semester</td>
                                                <td>tahun ajaran</td>
                                                <td>action</td>
                                            </thead>
                                            <tbody>
                                                <h1>semua tugas tampil</h1>
                                                @foreach($semua_tugas_tampil as $p)
                                                    <tr>
                                                        <td>{{ $p->siswa_name }}</td>
                                                        <td>{{ $p->siswa_nisn }}</td>
                                                        <td>{{ $p->judul }}</td>
                                                        <td>{{ $p->file_or_link }}</td>
                                                        <td>{{ $p->description }}</td>
                                                        <td>{{ $p->pengumpulan }}</td>
                                                        <td>
                                                            @if($p->jawaban_siswa !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->jawaban_siswa }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->jawaban_siswa == null)
                                                                <p style="color:red">
                                                                    Siswa Belum mengumpulkan tugas     <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($p->nilai !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->nilai }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->nilai == null)
                                                                <p style="color:red">
                                                                    Siswa Belum dkasih nilai  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($p->komentar_guru !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->komentar_guru }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->komentar_guru == null)
                                                                <p style="color:red">
                                                                    belum dikasih komentar  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $p->tahun_ajaran }}</td>
                                                        <td>{{ $p->semester }}</td>
                                                        <td>{{ $p->created_at }}</td>
                                                            <td>
                                                                @if($p->nilai == null)
                                                                    @if($p->jawaban_siswa !== null)
                                                                        <a href="/jawaban/guru/{{$p->id}}" class="btn btn-success" >Beri nilai</a>
                                                                    @endif
                                                                @endif
                                                                {{-- @if($p->jawaban_siswa !== null)
                                                                    <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >jawab</a>
                                                                @endif --}}
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

        <div class="collapse mt-4" id="tampilsemuamateri">
            <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                    @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                   
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <td>judul</td>
                                                    <td>type</td>
                                                    <td>file or link</td>
                                                    <td>description</td>
                                                    <td>tanggal</td>
                                                    <td>pertemuan</td>
                                                </thead>
                                                <tbody>
                                                    <h1>semua materi tampil</h1>
                                                    @foreach($semua_materi_tampil as $p)
                                                        <tr>
                                                            <td>{{ $p->judul }}</td>
                                                            <td>{{ $p->type }}</td>
                                                            <td>{{ $p->file_or_link}}</td>
                                                            <td>{{ $p->description }}</td>
                                                            <td>{{ $p->pertemuan }}</td>
                                                            <td>{{ $p->created_at }}</td>
                                                            {{-- <td><button class="btn btn-success">Link</button></td> --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

    {{-- tampil semua ulangan --}}
        <div class="collapse mt-4" id="tampilsemuaulangan">
            <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                    @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    <div class="table-responsive">    
                                        <table class="table table-hover">
                                            <thead>
                                                <td>Nama Siswa</td>
                                                <td>NISN</td>
                                                <td>Judul</td>
                                                <td>ulangan</td>
                                                <td>description</td>
                                                <td>batas pengumpulan</td>
                                                <td>jawaban siswa</td>
                                                <td>nilai</td>
                                                <td>komentar guru</td>
                                                <td>tanggal pemberian ulangan</td>
                                                <td>semester</td>
                                                <td>tahun ajaran</td>
                                                <td>action</td>
                                            </thead>
                                            <tbody>
                                                <h1>semua ulangan tampil</h1>
                                                @foreach($semua_ulangan_tampil as $p)
                                                    <tr>
                                                        <td>{{ $p->siswa_name }}</td>
                                                        <td>{{ $p->siswa_nisn }}</td>
                                                        <td>{{ $p->judul_ulangan }}</td>
                                                        <td>{{ $p->file_or_link }}</td>
                                                        <td>{{ $p->description }}</td>
                                                        <td>{{ $p->pengumpulan }}</td>
                                                        <td>
                                                            @if($p->jawaban_siswa !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->jawaban_siswa }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->jawaban_siswa == null)
                                                                <p style="color:red">
                                                                    Siswa Belum mengumpulkan ulangan     <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($p->nilai !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->nilai }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->nilai == null)
                                                                <p style="color:red">
                                                                    Siswa Belum dkasih nilai  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($p->komentar_guru !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->komentar_guru }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->komentar_guru == null)
                                                                <p style="color:red">
                                                                    belum dikasih komentar  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $p->tahun_ajaran }}</td>
                                                        <td>{{ $p->semester }}</td>
                                                        <td>{{ $p->created_at }}</td>
                                                            <td>
                                                                @if($p->nilai == null)
                                                                    @if($p->jawaban_siswa !== null)
                                                                        <a href="/jawaban/guru/{{$p->id}}" class="btn btn-success" >Beri nilai</a>
                                                                    @endif
                                                                @endif
                                                                {{-- @if($p->jawaban_siswa !== null)
                                                                    <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >jawab</a>
                                                                @endif --}}
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        {{-- tampil semua ujian --}}
        <div class="collapse mt-4" id="tampilsemuaujian">
            <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="{{ route('cari_tugas_filter', encrypt($jadwal->id)) }}" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                    @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    <div class="table-responsive">    
                                        <table class="table table-hover">
                                            <thead>
                                                <td>Nama Siswa</td>
                                                <td>NISN</td>
                                                <td>Judul</td>
                                                <td>ulangan</td>
                                                <td>description</td>
                                                <td>batas pengumpulan</td>
                                                <td>jawaban siswa</td>
                                                <td>nilai</td>
                                                <td>komentar guru</td>
                                                <td>tanggal pemberian ulangan</td>
                                                <td>semester</td>
                                                <td>tahun ajaran</td>
                                                <td>action</td>
                                            </thead>
                                            <tbody>
                                                <h1>semua ujian tampil</h1>
                                                @foreach($semua_ujian_tampil as $p)
                                                    <tr>
                                                        <td>{{ $p->siswa_name }}</td>
                                                        <td>{{ $p->siswa_nisn }}</td>
                                                        <td>{{ $p->judul }}</td>
                                                        <td>{{ $p->file_or_link }}</td>
                                                        <td>{{ $p->description }}</td>
                                                        <td>{{ $p->pengumpulan }}</td>
                                                        <td>
                                                            @if($p->jawaban_siswa !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->jawaban_siswa }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->jawaban_siswa == null)
                                                                <p style="color:red">
                                                                    Siswa Belum mengumpulkan ulangan     <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($p->nilai !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->nilai }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->nilai == null)
                                                                <p style="color:red">
                                                                    Siswa Belum dkasih nilai  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($p->komentar_guru !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->komentar_guru }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->komentar_guru == null)
                                                                <p style="color:red">
                                                                    belum dikasih komentar  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $p->tahun_ajaran }}</td>
                                                        <td>{{ $p->semester }}</td>
                                                        <td>{{ $p->created_at }}</td>
                                                            <td>
                                                                @if($p->nilai == null)
                                                                    @if($p->jawaban_siswa !== null)
                                                                        <a href="/jawaban/guru/{{$p->id}}" class="btn btn-success" >Beri nilai</a>
                                                                    @endif
                                                                @endif
                                                                {{-- @if($p->jawaban_siswa !== null)
                                                                    <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >jawab</a>
                                                                @endif --}}
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

            {{-- tampil semua tugas --}}
    <div class="collapse mt-4" id="tugashariini">
        <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="{{ route('cari_tugas_filter', encrypt($jadwal->id)) }}" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                    @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    <div class="table-responsive">    
                                        <table class="table table-hover">
                                            <thead>
                                                <td>Nama Siswa</td>
                                                <td>NISN</td>
                                                <td>Judul</td>
                                                <td>Tugas</td>
                                                <td>description</td>
                                                <td>batas pengumpulan</td>
                                                <td>jawaban siswa</td>
                                                <td>nilai</td>
                                                <td>komentar guru</td>
                                                <td>tanggal pemberian tugas</td>
                                                <td>semester</td>
                                                <td>tahun ajaran</td>
                                                <td>action</td>
                                            </thead>
                                            <tbody>
                                                <h3>Tugas Hari ini</h3>
                                                @foreach($tugas_tampil_hari_ini as $p)
                                                    <tr>
                                                        <td>{{ $p->siswa_name }}</td>
                                                        <td>{{ $p->siswa_nisn }}</td>
                                                        <td>{{ $p->judul }}</td>
                                                        <td>{{ $p->file_or_link }}</td>
                                                        <td>{{ $p->description }}</td>
                                                        <td>{{ $p->pengumpulan }}</td>
                                                        <td>
                                                            @if($p->jawaban_siswa !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->jawaban_siswa }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->jawaban_siswa == null)
                                                                <p style="color:red">
                                                                    Siswa Belum mengumpulkan tugas     <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($p->nilai !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->nilai }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->nilai == null)
                                                                <p style="color:red">
                                                                    Siswa Belum dkasih nilai  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($p->komentar_guru !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->komentar_guru }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->komentar_guru == null)
                                                                <p style="color:red">
                                                                    belum dikasih komentar  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $p->tahun_ajaran }}</td>
                                                        <td>{{ $p->semester }}</td>
                                                        <td>{{ $p->created_at }}</td>
                                                            <td>
                                                                @if($p->nilai == null)
                                                                    @if($p->jawaban_siswa !== null)
                                                                        <a href="/jawaban/guru/{{$p->id}}" class="btn btn-success" >Beri nilai</a>
                                                                    @endif
                                                                @endif
                                                                {{-- @if($p->jawaban_siswa !== null)
                                                                    <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >jawab</a>
                                                                @endif --}}
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    {{-- //ulangan hari ini --}}
    <div class="collapse mt-4" id="ulanganhariini">
        <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="{{ route('cari_tugas_filter', encrypt($jadwal->id)) }}" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                    @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    <div class="table-responsive">    
                                        <table class="table table-hover">
                                            <thead>
                                                <td>Nama Siswa</td>
                                                <td>NISN</td>
                                                <td>Judul</td>
                                                <td>Tugas</td>
                                                <td>description</td>
                                                <td>batas pengumpulan</td>
                                                <td>jawaban siswa</td>
                                                <td>nilai</td>
                                                <td>komentar guru</td>
                                                <td>tanggal pemberian tugas</td>
                                                <td>semester</td>
                                                <td>tahun ajaran</td>
                                                <td>action</td>
                                            </thead>
                                            <tbody>
                                                <h1>ulangan hari ini</h1>
                                                @foreach($ulangan_tampil_hari_ini as $p)
                                                    <tr>
                                                        <td>{{ $p->siswa_name }}</td>
                                                        <td>{{ $p->siswa_nisn }}</td>
                                                        <td>{{ $p->judul }}</td>
                                                        <td>{{ $p->file_or_link }}</td>
                                                        <td>{{ $p->description }}</td>
                                                        <td>{{ $p->pengumpulan }}</td>
                                                        <td>
                                                            @if($p->jawaban_siswa !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->jawaban_siswa }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->jawaban_siswa == null)
                                                                <p style="color:red">
                                                                    Siswa Belum mengumpulkan tugas     <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($p->nilai !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->nilai }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->nilai == null)
                                                                <p style="color:red">
                                                                    Siswa Belum dkasih nilai  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($p->komentar_guru !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->komentar_guru }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->komentar_guru == null)
                                                                <p style="color:red">
                                                                    belum dikasih komentar  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $p->tahun_ajaran }}</td>
                                                        <td>{{ $p->semester }}</td>
                                                        <td>{{ $p->created_at }}</td>
                                                            <td>
                                                                @if($p->nilai == null)
                                                                    @if($p->jawaban_siswa !== null)
                                                                        <a href="/jawaban/guru/{{$p->id}}" class="btn btn-success" >Beri nilai</a>
                                                                    @endif
                                                                @endif
                                                                {{-- @if($p->jawaban_siswa !== null)
                                                                    <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >jawab</a>
                                                                @endif --}}
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

    <div class="collapse mt-4" id="ujianhariini">
        <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="{{ route('cari_tugas_filter', encrypt($jadwal->id)) }}" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                    @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    <div class="table-responsive">    
                                        <table class="table table-hover">
                                            <thead>
                                                <td>Nama Siswa</td>
                                                <td>NISN</td>
                                                <td>Judul</td>
                                                <td>Tugas</td>
                                                <td>description</td>
                                                <td>batas pengumpulan</td>
                                                <td>jawaban siswa</td>
                                                <td>nilai</td>
                                                <td>komentar guru</td>
                                                <td>tanggal pemberian tugas</td>
                                                <td>semester</td>
                                                <td>tahun ajaran</td>
                                                <td>action</td>
                                            </thead>
                                            <tbody>
                                                <h1>Ujian Hari Ini</h1>
                                                @foreach($ujian_tampil_hari_ini as $p)
                                                    <tr>
                                                        <td>{{ $p->siswa_name }}</td>
                                                        <td>{{ $p->siswa_nisn }}</td>
                                                        <td>{{ $p->judul }}</td>
                                                        <td>{{ $p->file_or_link }}</td>
                                                        <td>{{ $p->description }}</td>
                                                        <td>{{ $p->pengumpulan }}</td>
                                                        <td>
                                                            @if($p->jawaban_siswa !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->jawaban_siswa }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->jawaban_siswa == null)
                                                                <p style="color:red">
                                                                    Siswa Belum mengumpulkan tugas     <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($p->nilai !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->nilai }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->nilai == null)
                                                                <p style="color:red">
                                                                    Siswa Belum dkasih nilai  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($p->komentar_guru !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $p->komentar_guru }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($p->komentar_guru == null)
                                                                <p style="color:red">
                                                                    belum dikasih komentar  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $p->tahun_ajaran }}</td>
                                                        <td>{{ $p->semester }}</td>
                                                        <td>{{ $p->created_at }}</td>
                                                            <td>
                                                                @if($p->nilai == null)
                                                                    @if($p->jawaban_siswa !== null)
                                                                        <a href="/jawaban/guru/{{$p->id}}" class="btn btn-success" >Beri nilai</a>
                                                                    @endif
                                                                @endif
                                                                {{-- @if($p->jawaban_siswa !== null)
                                                                    <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >jawab</a>
                                                                @endif --}}
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    
    <div class="collapse mt-4" id="materihariini">
        <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="{{ route('cari_tugas_filter', encrypt($jadwal->id)) }}" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun ajaran</label>
                                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                                    <option class="form-control" value="2020">2020</option>
                                                    <option class="form-control" value="2021">2021</option>
                                                    <option class="form-control" value="2022">2022</option>
                                                    <option class="form-control" value="2023">2023</option>
                                                    <option class="form-control" value="2024">2024</option>
                                                    <option class="form-control" value="2025">2025</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label>pilih semester</label>
                                                <select class="form-control" name="semester" id="semester">
                                                    @foreach($semester as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <td>judul</td>
                                                <td>type</td>
                                                <td>file or link</td>
                                                <td>description</td>
                                                <td>pertemuan</td>
                                                <td>tanggal</td>
                                                {{-- <td>Action</td> --}}
                                            </thead>
                                            <tbody>
                                                <h1>Materi hari ini</h1>
                                                @foreach($materi_hari_ini_tampil as $p)
                                                    <tr>
                                                        <td>{{ $p->judul }}</td>
                                                        <td>{{ $p->type }}</td>
                                                        <td>{{ $p->file_or_link}}</td>
                                                        <td>{{ $p->description }}</td>
                                                        <td>{{ $p->pertemuan }}</td>
                                                        <td>{{ $p->tanggal }}</td>
                                                        {{-- <td><button class="btn btn-success">Link</button></td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
<div>
</div>


<div class="collapse mt-4" id="absensi">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <h1>siswa sudah absen</h1>
                                    @foreach($hadir as $p)
                                        <tr>
                                            <td>
                                                {{ $p->siswa->name }}
                                            </td>
                                            <td>
                                                @if($p->status == null)
                                                    <p style="color:red">belum absens</p>
                                                @endif
                                                @if($p->status == null)
                                                   {{ $p->status }}
                                                @endif
                                                 {{ $p->status }}
                                            </td>
                                            <td>
                                                <a href="{{ route('kelas.store_absen_get', $p->id) }}" class="btn btn-primary">
                                                    absen
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="collapse mt-4" id="belumabsensi">
    <div class="row mb-4 mt-4">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <h1>siswa belum absens</h1>
                                    @foreach($siswa_belum_absens as $p)
                                        <tr>
                                            <td>
                                                {{ $p->siswa->name }}
                                            </td>
                                            <td>
                                                @if($p->status == null)
                                                    <p style="color:red">belum absens</p>
                                                @endif
                                                @if($p->status == null)
                                                   {{ $p->status }}
                                                @endif
                                                 {{-- {{ $p->status }} --}}
                                            </td>
                                            <td>
                                                <a href="{{ route('kelas.store_absen_get', $p->id) }}" class="btn btn-primary">
                                                    absen
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            {{-- //absens --}}
<div>
    <div class="modal fade" id="absen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <h1>Absensi</h1>
                <div class="my-2">
                    <label for="name">Siswa</label> 
                    <div class="my-2">
                        <label for="name">Siswa</label>
                        <select class="form-control" name="status">
                            <option class="form-control" disabled>-----pilih absen----</option>
                            <option class="form-control" value="hadir">Hadir</option>
                            <option class="form-control" value="izin">Izin</option>
                            <option  class="form-control" value="sakit">Sakit</option>
                            </select>
                    </div>
                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
        </div>
    </div>
</div>
</div>



        <!-- Modal tugas -->
    <div class="modal fade" id="tugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('tugas') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'> 
                            <input type="hidden" value="{{ $jadwal->kelas_id }}" name='kelas_id'> 
                            <input type="hidden" value="{{ $hariini }}" name='tanggal'> 
                            <input type="hidden" value="{{  Auth::guard('guru')->user()->id }}" name='guru_id'> 

                                <div class="my-2">
                                    <label for="">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="masukan judul" required>
                                </div>      
                                
                                <div class="my-2">
                                    <label for="">type</label>
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        PDF
                                                    </button>
                                                </h2>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <input type="hidden" value="pdf" name='type'> 
                                                        <input type="file" name="file_or_link" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Link
                                                    </button>
                                                </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <input type="hidden" value="link" name='type'> 
                                                        <input type="text" name="file_or_link" class="form-control" placeholder="masukan link" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="my-2">
                                    <label for="">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="masukan description" required>
                                </div>  

                                
                                <div class="my-2">
                                    <label for="">pertemuan</label>
                                    <input type="number" name="pertemuan" id="pertemuan" class="form-control" placeholder="masukan pertemuan" required>
                                </div>

                                <div class="my-2">
                                    <label for="">Batas Pengumpulan</label>
                                    <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required>
                                </div>  
                                <div class="my-2">
                                    <label for="">Semester</label>
                                    {{-- <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required> --}}
                                    <select class="form-control" name="semester" id="semester">
                                        @foreach($semester as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="my-2">
                                    <label for="">Tahun Ajaran</label>
                                    {{-- <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required> --}}
                                    <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>  
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                </form>

        </div>
    </div>

        <!-- Modal ulangan -->
    <div class="modal fade" id="ulangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ulangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('ulangan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'> 
                            <input type="hidden" value="{{ $jadwal->kelas_id }}" name='kelas_id'> 
                            <input type="hidden" value="{{ $hariini }}" name='tanggal'> 
                            <input type="hidden" value="{{  Auth::guard('guru')->user()->id }}" name='guru_id'> 

                                <div class="my-2">
                                    <label for="">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="masukan judul" required>
                                </div>      
                                
                                <div class="my-2">
                                    <label for="">type</label>
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        PDF
                                                    </button>
                                                </h2>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <input type="hidden" value="pdf" name='type'> 
                                                        <input type="file" name="file_or_link" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Link
                                                    </button>
                                                </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <input type="hidden" value="link" name='type'> 
                                                        <input type="text" name="file_or_link" class="form-control" placeholder="masukan link" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="my-2">
                                    <label for="">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="masukan description" required>
                                </div>  

                                
                                <div class="my-2">
                                    <label for="">pertemuan</label>
                                    <input type="number" name="pertemuan" id="pertemuan" class="form-control" placeholder="masukan pertemuan" required>
                                </div>

                                <div class="my-2">
                                    <label for="">Batas Pengumpulan</label>
                                    <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required>
                                </div>  
                                <div class="my-2">
                                    <label for="">Semester</label>
                                    {{-- <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required> --}}
                                    <select class="form-control" name="semester" id="semester">
                                        @foreach($semester as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="my-2">
                                    <label for="">Tahun Ajaran</label>
                                    {{-- <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required> --}}
                                    <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>  
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                </form>

        </div>
    </div>

        <!-- Modal ujian -->
    <div class="modal fade" id="ujian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ujian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('ujian') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'> 
                            <input type="hidden" value="{{ $jadwal->kelas_id }}" name='kelas_id'> 
                            <input type="hidden" value="{{ $hariini }}" name='tanggal'> 
                            <input type="hidden" value="{{  Auth::guard('guru')->user()->id }}" name='guru_id'> 

                                <div class="my-2">
                                    <label for="">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="masukan judul" required>
                                </div>      
                                
                                <div class="my-2">
                                    <label for="">type</label>
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        PDF
                                                    </button>
                                                </h2>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <input type="hidden" value="pdf" name='type'> 
                                                        <input type="file" name="file_or_link" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Link
                                                    </button>
                                                </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <input type="hidden" value="link" name='type'> 
                                                        <input type="text" name="file_or_link" class="form-control" placeholder="masukan link" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="my-2">
                                    <label for="">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="masukan description" required>
                                </div>  

                                
                                <div class="my-2">
                                    <label for="">pertemuan</label>
                                    <input type="number" name="pertemuan" id="pertemuan" class="form-control" placeholder="masukan pertemuan" required>
                                </div>

                                <div class="my-2">
                                    <label for="">Batas Pengumpulan</label>
                                    <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required>
                                </div>  
                                <div class="my-2">
                                    <label for="">Semester</label>
                                    {{-- <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required> --}}
                                    <select class="form-control" name="semester" id="semester">
                                        @foreach($semester as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="my-2">
                                    <label for="">Tahun Ajaran</label>
                                    {{-- <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required> --}}
                                    <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>  
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                </form>

        </div>
    </div>

        <!-- Modal absen -->
    <div class="modal fade" id="absenhariini" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('buat_absen') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'> 
                            <input type="hidden" value="{{ $jadwal->kelas_id }}" name='kelas_id'> 
                            <input type="hidden" value="{{ $hariini }}" name='tanggal'> 
                            {{-- <input type="hidden" value="{{  Auth::guard('guru')->user()->id }}" name='guru_id'>  --}}<div class="my-2">
                                    <label for="">pertemuan</label>
                                    <input type="number" name="pertemuan" id="pertemuan" class="form-control" placeholder="masukan pertemuan">
                                </div>
                                <div class="my-2">
                                    <label for="">Semester</label>
                                    {{-- <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required> --}}
                                    <select class="form-control" name="semester" id="semester">
                                        @foreach($semester as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                    
                                <div class="my-2">
                                    <label for="">tahun ajaran</label>
                                    <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>  
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                </form>

        </div>
    </div>

    <div class="modal fade" id="materi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('materi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'> 
                        <input type="hidden" value="{{ $jadwal->kelas_id }}" name='kelas_id'> 
                        <input type="hidden" value="{{ $hariini }}" name='tanggal'> 

                            <div class="my-2">
                                <label for="">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="masukan judul" required>
                            </div>      
                            
                            <div class="my-2">
                                <label for="">type</label>
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    PDF
                                                </button>
                                            </h2>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <input type="hidden" value="pdf" name='type'> 
                                                    <input type="file" name="file_or_link" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Link
                                                </button>
                                            </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <input type="hidden" value="link" name='type'> 
                                                    <input type="text" name="file_or_link" class="form-control" placeholder="masukan link" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="my-2">
                                <label for="">Description</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="masukan description" required>
                            </div> 
                            <div class="my-2">
                                <label for="">pertemuan</label>
                                <input type="number" name="pertemuan" id="pertemuan" class="form-control" placeholder="masukan pertemuan" required>
                            </div> 
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
            </form>
        </div>
    </div>

        <div class="modal fade" id="materisemua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Semua Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <td>judul</td>
                                                    <td>type</td>
                                                    <td>file or link</td>
                                                    <td>description</td>
                                                    <td>tanggal</td>
                                                    <td>pertemuan</td>
                                                </thead>
                                                <tbody>
                                                    <h1>semua materi tampil</h1>
                                                    @foreach($semua_materi_tampil as $p)
                                                        <tr>
                                                            <td>{{ $p->judul }}</td>
                                                            <td>{{ $p->type }}</td>
                                                            <td>{{ $p->file_or_link}}</td>
                                                            <td>{{ $p->description }}</td>
                                                            <td>{{ $p->pertemuan }}</td>
                                                            <td>{{ $p->created_at }}</td>
                                                            {{-- <td><button class="btn btn-success">Link</button></td> --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
            </div>
        </div>
@endsection