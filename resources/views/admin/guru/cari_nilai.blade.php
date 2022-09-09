@extends('layouts.template_admin')
@section('content')
      <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="nav-item">
                        <form action="{{ route('raport_cari') }}" method="get" class="site-block-top-search" >
                            @csrf
                            {{-- <span class="icon icon-search2"></span> --}}
                            {{-- <input type="text" class="form-control border-0" name="cari" placeholder="Search"> --}}
                            <select class="form-control" name="cari" id="cari">
                                <option class="form-control" value="semester 1 ganjil">semester 1 ganjil</option>
                                <option class="form-control" value="semester 1">semester 1</option>
                                <option class="form-control" value="semester 2 ganjil">semester 2 ganjil</option>
                                <option class="form-control" value="semester 2">semester 2</option>
                            </select>
                            <select class="form-control mt-2" name="kelas" id="kelas">
                            {{-- <option class="form-control">kelas</option> --}}
                                @foreach($kelas as $p)
                                    <option value="{{ $p->id }}">{{ $p->kelas }}</option>
                                @endforeach
                            </select>
                            <select class="form-control mt-2" name="tahun_ajaran" id="tahun_ajaran">
                                <option class="form-control" value="2020">2020</option>
                                <option class="form-control" value="2021">2021</option>
                                <option class="form-control" value="2022">2022</option>
                            </select>
                            <input type="submit" class="btn btn-primary mt-2" value="cari"/>
                        </form>
                    </div>
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
                                    <th>semester</th>
                                    <th>nilai raport</th>
                                    <th>tahun ajaran</th>
                                    {{-- <th>action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <h1>raport</h1>
                                @foreach($raport as $p)
                                    <tr>
                                        <td>{{$p->siswa->name}}</td>
                                        <td>{{$p->siswa->nisn}}</td>
                                        <td>{{$p->kelas->kelas}}</td>
                                       <td>
                                            @if($p->nilai_tugas !== null)
                                                {{$p->nilai_tugas}}
                                            @endif
                                            @if($p->nilai_tugas == null)
                                                <p style="color:red">belum ada nilai</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->nilai_ulangan !== null)
                                                {{$p->nilai_ulangan}}
                                            @endif
                                            @if($p->nilai_ulangan == null)
                                                <p style="color:red">belum ada nilai</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->nilai_ujian !== null)
                                                {{$p->nilai_ujian}}
                                            @endif
                                            @if($p->nilai_ujian == null)
                                                <p style="color:red">belum ada nilai</p>
                                            @endif
                                        </td>
                                        <td>
                                            {{$p->semester}}
                                        </td>
                                        <td>{{$p->nilai_raport}}</td>
                                        <td>{{$p->tahun_ajaran}}</td>
                                        {{-- <td><a href="{{ route('get_raport', $p->id) }}"> edit</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection 