@extends('layouts.template_siswa')
@section('contents')
<x-alert />
    <div class="row justify-content-center">
        <div class="card col-sm-12 col-lg-5">
            <div class="card-body">
                
                <div class="row">
                    <div class="col mb-4 mb-lg-0 text-center">
                        <div>
                            <i data-feather="book-open" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Semua Materi</div>
                                <h6 class="badge badge-dark">{{ $materi_hari_ini }}</h6><br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#materisemua">
                                     lihat materi
                                </button>
                        </div>
                    </div>
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                        <div class="mt-2 font-weight-bold" style="color: #6c757d;">Semua Tugas</div>
                            <h6 class="badge badge-dark">{{ $semua_tugas }}</h6><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tugastugassemua">
                                lihat semua
                            </button>
                    </div>
                    {{-- <div class="col mb-4 mb-lg-0 text-center">
                        <a href="{{ route('absensi.create', encrypt($jadwal->id)) }}">
                            <i data-feather="clipboard" style="width: 80px; height: 60px; color: #6c757d;"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Absensi</div>
                        </a>
                    </div> --}}
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
                        <div class="mt-2 font-weight-bold mb-1">hadir</div>
                        <h6 class="badge badge-dark">{{ $hadir_count }}</h6> siswa
                    </div>
                    

                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-x" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Tidak Masuk</div>
                        <h6 class="badge badge-danger">{{ $hitung_absen }}</h6> siswa
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-body">
  <div class="table-responsive">
                                
                                <table class="table table-hover">
                                    <thead>
                                        <td>Nama Siswa</td>
                                        <td>Judul</td>
                                        <td>Tugas</td>
                                        <td>description</td>
                                        <td>batas pengumpulan</td>
                                        <td>jawaban siswa</td>
                                        <td>nilai</td>
                                        <td>komentar guru</td>
                                        <td>tanggal pemberian tugas</td>
                                        <td>Action</td>
                                    </thead>
                                    <tbody>
                                        <h1>tugas hari ini</h1>
                                        @foreach($semua_tugas_tampil_tampil as $p)
                                            <tr>
                                                <td>{{ $p->siswa->name }}</td>
                                                <td>{{ $p->tugas->judul }}</td>
                                                <td>{{ $p->tugas->file_or_link }}</td>
                                                <td>{{ $p->tugas->description }}</td>
                                                <td>{{ $p->tugas->pengumpulan }}</td>
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
                                                <td>{{ $p->created_at }}</td>
                                                    <td>
                                                        @if($p->jawaban_siswa == null)
                                                                <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >kirim tugas</a>
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
                        </thead>
                        <tbody>
                               <h1>Materi hari ini</h1>
                            @foreach($materi_hari_ini_tampil as $p)
                                <tr>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ $p->type }}</td>
                                    <td>{{$p->file_or_link}}</td>
                                    <td>{{ $p->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($checkabsen->status !== null)
                                   <button class="btn btn-danger first">Absen</button>
                                @endif

                                @if($checkabsen->status == null)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absen">
                                        absen
                                    </button>
                                @endif


                                <h1 class="mt-3">Absensi siswa</h1>
                                    @foreach($hadir as $p)
                                        <tr>
                                            <td>
                                                {{ $p->siswa->name }}
                                            </td>
                                            <td>
                                                @if($p->status == null)
                                                    <p style="color:red">belum absens</p>
                                                @endif
                                                @if($p->status !== null)
                                                    {{ $p->status }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


{{-- //absens --}}
<div class="modal fade" id="absen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('absen-siswa', $checkabsen->id) }}" method="post">
                                    @csrf
                                    {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'> --}}
                                    {{-- <input type="hidden" value="{{ $hariini }}" name='tanggal'>  --}}
                                    {{-- <input type="hidden" value="{{ Auth::guard('siswa')->user()->id}}" name='siswa_id'>  --}}
                                    {{-- <input type="hidden" value="hadir" name='status'>  --}}
                                    <h1>Absensi</h1>
                                        <div class="my-2">
                                            <label for="name">Siswa</label> 
                                            <input type="text" class="form-control" value="{{ Auth::guard('siswa')->user()->name}}" disabled/>
                                                <div class="my-2">
                                                    <label for="name">Siswa</label>
                                                    <select class="form-control" name="status">
                                                        <option disabled>-----pilih absen----</option>
                                                        <option value="hadir">Hadir</option>
                                                        <option value="izin">Izin</option>
                                                        <option value="sakit">Sakit</option>
                                                    </select>
                                                </div>
                                        </div>
                                        {{-- <button class="btn btn-primary mb-3">absen</button> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
    </div>
  </div>
</div>
<!-- Modal -->
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
                            <label for="">Batas Pengumpulan</label>
                            <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required>
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
                            <label for="">Batas Pengumpulan</label>
                            <input type="date" name="pengumpulan" id="pengumpulan" class="form-control" placeholder="masukan pengumpulan" required>
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

<div>
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
                                        </thead>
                                        <tbody>
                                            <h1>semua materi tampil</h1>
                                            @foreach($semua_materi_tampil as $p)
                                                <tr>
                                                    <td>{{ $p->judul }}</td>
                                                    <td>{{ $p->type }}</td>
                                                    <td>{{ $p->file_or_link}}</td>
                                                    <td>{{ $p->description }}</td>
                                                    <td>{{ $p->created_at }}</td>
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

<!-- Modal semua tugas -->
<div class="modal fade" id="tugastugassemua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Semua Tugas</h5>
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
                                        <td>Judul</td>
                                        <td>Tugas</td>
                                        <td>description</td>
                                        <td>batas pengumpulan</td>
                                        <td>jawaban siswa</td>
                                        <td>nilai</td>
                                        <td>komentar guru</td>
                                        <td>tanggal pemberian tugas</td>
                                        <td>Action</td>
                                    </thead>
                                    <tbody>
                                        <h1>semua tugas tampil</h1>
                                        @foreach($semua_tugas_tampil as $p)
                                            <tr>
                                                <td>{{ $p->tugas->judul }}</td>
                                                <td>{{ $p->tugas->file_or_link }}</td>
                                                <td>{{ $p->tugas->description }}</td>
                                                <td>{{ $p->tugas->pengumpulan }}</td>
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
                                                <td>{{ $p->created_at }}</td>
                                                    <td>
                                                        @if($p->jawaban_siswa == null)
                                                                <a href="{{ route('get_jawaban_siswa', $p->id )}}" class="btn btn-success" >Beri nilai</a>
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
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
  </div>
</div>




</div>
@endsection
@section('js')
	<script>
			document.querySelector(".first").addEventListener('click', function(){
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Anda Sudah melakukan Absens!',
				})
			});
	</script>
	<!-- JS Libraies -->
	@endsection	


