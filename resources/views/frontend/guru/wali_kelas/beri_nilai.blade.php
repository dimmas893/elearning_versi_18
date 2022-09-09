@extends('layouts.template_guru')
@section('contents')

<x-alert />
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                     {{-- <div class="nav-item">
                        <form action="" method="get" class="site-block-top-search" >
                            @csrf
                            <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" name="cari" placeholder="Search">
                        </form>
                    </div> --}}
                    <a href="{{ route('wali_kelas_raport') }}" class="btn btn-primary">kembali</a>
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>nisn</th>
                                    <th>Kelas</th>
                                    <th>nilai tugas</th>
                                    <th>nilai ulangan</th>
                                    <th>nilai ujian</th>
                                    <th>nilai raport</th>
                                    <th>Tahun Ajaran</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>raport</h1>
                                <form action="{{route('wali_kelas_raport_cari_id_post', $raport->id)}}"  method="POST" enctype="multipart/form-data">
                                {{-- @foreach($raport as $p) --}}
                                @csrf
                                    <tr>
                                        <td>{{$raport->siswa->name}}</td>
                                        <td>{{$raport->siswa->nisn}}</td>
                                        <td>{{$raport->kelas->kelas}}</td>
                                        <td>
                                            @if($raport->nilai_tugas !== null)
                                                {{$raport->nilai_tugas}}
                                                 <input type="number" name="nilai_tugas" id="nilai_tugas" value="{{$raport->nilai_tugas}}" class="form-control" placeholder="edit nilai tugas">
                                            @endif
                                            @if($raport->nilai_tugas == null)
                                                 <input type="number" name="nilai_tugas" id="nilai_tugas" class="form-control" placeholder="masukan nilai tugas">
                                            @endif
                                        </td>
                                        <td>
                                            @if($raport->nilai_ulangan !== null)
                                                {{$raport->nilai_ulangan}}
                                                <input type="number" name="nilai_ulangan" id="nilai_ulangan" value="{{$raport->nilai_ulangan}}" class="form-control" placeholder="edit nilai ulangan">
                                            @endif
                                            @if($raport->nilai_ulangan == null)
                                                <input type="number" name="nilai_ulangan" id="nilai_ulangan" class="form-control" placeholder="masukan nilai ulangan">
                                            @endif
                                        </td>
                                        <td>
                                            @if($raport->nilai_ujian !== null)
                                                {{$raport->nilai_ujian}}
                                                <input type="number" name="nilai_ujian" id="nilai_ujian" value="{{$raport->nilai_ujian}}" class="form-control" placeholder="edit nilai ujian">
                                            @endif
                                            @if($raport->nilai_ujian == null)
                                                <input type="number" name="nilai_ujian" id="nilai_ujian" class="form-control" placeholder="masukan nilai ujian">
                                            @endif
                                        </td>
                                        <td>{{$raport->nilai_raport}}</td>
                                        
                                        <td>{{$raport->tahun_ajaran}}</td>
                                        <td>
                                            <input type="submit" class="btn btn-primary" value="save">
                                        </td>
                                        {{-- <td><a href="{{ route('get_raport', $p->id) }}"> edit</a></td> --}}
                                    </tr>
                                </form>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection