@extends('layouts.template_guru')
@section('contents')
<x-alert />
{{-- <a href="{{ route('kelas-masuk' ,encrypt($jadwal->id))}}" class="btn btn-primary"> kembali</a> --}}
    <form action="{{ route('kelas.store_absen', $absens->id) }}" method="post">
                                    @csrf
                                    {{-- <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'> --}}
                                    {{-- <input type="hidden" value="{{ $hariini }}" name='tanggal'>  --}}
                                    {{-- <input type="hidden" value="{{ Auth::guard('siswa')->user()->id}}" name='siswa_id'>  --}}
                                    {{-- <input type="hidden" value="hadir" name='status'>  --}}
                        <h1>Absensi</h1>
                            <div class="my-2">
                            <label for="name">Siswa</label> 
                            <input type="text" class="form-control" value="{{ $absens->siswa->name }}" disabled/>
                            <label for="name" class="mt-3">NISN</label> 
                            <input type="text" class="form-control" value="{{ $absens->siswa->nisn }}" disabled/>
                            </div>
                                <div class="my-2">
                                        <label for="name">Absens</label>
                                        <select class="form-control" name="status">
                                        <option disabled>-----pilih absen----</option>
                                        <option value="hadir">Hadir</option>
                                        <option value="izin">Izin</option>
                                        <option value="sakit">Sakit</option>
                                    </select>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
@endsection