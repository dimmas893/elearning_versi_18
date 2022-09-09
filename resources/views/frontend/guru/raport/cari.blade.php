@extends('layouts.template_guru')
@section('contents')

   <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav-item">
                                <form action="{{ route('cari_raport') }}" method="get" class="site-block-top-search" >
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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>nisn</th>
                                    <th>nilai</th>
                                    <th>kelas</th>
                                    <th>semester</th>
                                    <th>tahun ajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>nilai tugas rata rata</h1>
                                @foreach($nilai_tugas as $p)
                                    <tr>
                                        <td>{{$p->siswa_name}}</td>
                                        <td>{{$p->nisn_siswa}}</td>
                                        <td>{{$p->nilai / $p->siswa_id * 0.3 }}</td>
                                        <td>{{$p->kelas_name}}</td>
                                        <td>{{$p->semesters}}</td>
                                        <td>{{$p->tahun_ajaran}}</td>
                                        {{-- <td><a href="{{ route('get_raport', $p->id) }}"> get</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>nisn</th>
                                    <th>nilai</th>
                                    <th>kelas</th>
                                    <th>semester</th>
                                    <th>tahun ajaran</th>
                                    {{-- <th>action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <h1>nilai ulangan rata rata</h1>
                                @foreach($nilai_ulangan as $p)
                                    <tr>
                                        <td>{{$p->siswa_name}}</td>
                                        <td>{{$p->nisn_siswa}}</td>
                                        <td>{{$p->nilai / $p->siswa_id * 0.3 }}</td>
                                        <td>{{$p->kelas_name}}</td>
                                        <td>{{$p->semesters}}</td>
                                        <td>{{$p->tahun_ajaran}}</td>
                                        {{-- <td><a href="{{ route('get_raport', $p->id) }}"> get</a></td> --}}
                                        {{-- <td>get</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>nisn</th>
                                    <th>nilai</th>
                                    <th>kelas</th>
                                    <th>semester</th>
                                    <th>tahun ajaran</th>
                                    {{-- <th>action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <h1>nilai ujian rata rata</h1>
                                @foreach($nilai_ujian as $p)
                                    <tr>
                                        <td>{{$p->siswa_name}}</td>
                                        <td>{{$p->nisn_siswa}}</td>
                                        <td>{{$p->nilai / $p->siswa_id * 0.4 }}</td>
                                        <td>{{$p->kelas_name}}</td>
                                        <td>{{$p->semesters}}</td>
                                        <td>{{$p->tahun_ajaran}}</td>
                                        {{-- <td><a href="{{ route('get_raport', $p->id) }}"> get</a></td> --}}
                                        {{-- <td>get</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection