@extends('layouts.template_siswa')
@section('contents')

<x-alert />
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    {{-- {{ $nilai_tugas->description }} --}}
                    <a href="{{ route('halaman_siswa_jadwal') }}" class="btn btn-success" value="kembali">kembali</a>
                    <h1>anda sudah mengirim jawaban</h1>
                    @if($nilai_tugas->jawaban_siswa == null)
                    <form action="{{ route('jawaban_siswa', $nilai_tugas->id) }}" method="POST">
                        @csrf
                        <input type="text" name="jawaban_siswa" class="form-control" required placeholder="jawaban anda"/>
                        <input type="submit" class="btn btn-success mt-2" value="kirim jawaban" />
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection