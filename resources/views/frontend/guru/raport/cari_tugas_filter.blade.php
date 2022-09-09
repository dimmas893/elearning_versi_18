@extends('layouts.template_guru')
@section('contents')
           <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="{{ route('cari_tugas_filter', encrypt($jadwal->id)) }}" method="get" class="site-block-top-search" >
                                        @csrf
                                        
                                        {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>  --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label>pilih tahun</label>
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
                                                    <option class="form-control" value="semester 1 ganjil">semester 1 ganjil</option>
                                                    <option class="form-control" value="semester 1">semester 1</option>
                                                    <option class="form-control" value="semester 2 ganjil">semester 2 ganjil</option>
                                                    <option class="form-control" value="semester 2">semester 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                                    </form>
                                    <a href="{{ route('kelas-masuk' ,encrypt($jadwal->id))}}" class="btn btn-primary"> kembali</a>
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
@endsection