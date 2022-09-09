@extends('layouts.template_guru')
@section('contents')

<x-alert />
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    @if($nilai_tugas_siswa->nilai !== null)
                        <h1>anda sudah mengirim jawaban</h1>
                    @endif
                     

                    {{-- @if($nilai_tugas_siswa->nilai == null) --}}
                     <label for="name">Nama Siswa</label> 
                            <input type="text" class="form-control" value="{{ $nilai_tugas_siswa->siswa->name }}" disabled/>
                            <label for="name" class="mt-3">NISN</label> 
                            <input type="text" class="form-control" value="{{ $nilai_tugas_siswa->siswa->nisn }}" disabled/>
                       <div class="mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="text-center">pengumpulan tugas</h1>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <td>Judul</td>
                                                <td>Tugas</td>
                                                <td>description</td>
                                                <td>batas pengumpulan</td>
                                                <td>jawaban siswa</td>
                                                <td>nilai</td>
                                                <td>komentar guru</td>
                                                <td>tanggal pemberian tugas</td>
                                            </thead>
                                            <tbody>
                                                <h1>semua tugas tampil</h1>
                                                    <tr>
                                                        <td>{{ $nilai_tugas_siswa->tugas->judul }}</td>
                                                        <td>{{ $nilai_tugas_siswa->tugas->file_or_link }}</td>
                                                        <td>{{ $nilai_tugas_siswa->tugas->description }}</td>
                                                        <td>{{ $nilai_tugas_siswa->tugas->pengumpulan }}</td>
                                                        <td>
                                                            @if($nilai_tugas_siswa->jawaban_siswa !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $nilai_tugas_siswa->jawaban_siswa }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($nilai_tugas_siswa->jawaban_siswa == null)
                                                                <p style="color:red">
                                                                    Siswa Belum mengumpulkan tugas     <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($nilai_tugas_siswa->nilai !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $nilai_tugas_siswa->nilai }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($nilai_tugas_siswa->nilai == null)
                                                                <p style="color:red">
                                                                    Siswa Belum dkasih nilai  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($nilai_tugas_siswa->komentar_guru !== null)
                                                                <p style="color:rgb(0, 255, 110)">
                                                                    {{ $nilai_tugas_siswa->komentar_guru }} <i class="bi bi-check"></i>
                                                                </p>
                                                            @endif                                         
                                                            @if($nilai_tugas_siswa->komentar_guru == null)
                                                                <p style="color:red">
                                                                    belum dikasih komentar  <i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i><i class="bi bi-exclamation"></i>  
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $nilai_tugas_siswa->created_at }}</td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                             <form action="{{ route('jawaban_siswa_nilai', $nilai_tugas_siswa->id) }}" method="POST">
                                @csrf
                                <label for="name" class="mt-3">Nilai</label> 
                                <input type="text" name="nilai" class="form-control" required placeholder="masukan nilai"/>
                                
                                <label for="name" class="mt-3">Komentar Guru</label> 
                                <input type="text" name="komentar_guru" class="form-control" required placeholder="masukan Komentar"/>
                                <input type="submit" class="btn btn-success mt-2" value="kirim jawaban" />
                            </form>
                       </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection