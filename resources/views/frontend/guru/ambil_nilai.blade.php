@extends('layouts.template_guru')
@section('contents')
    @foreach($nilai_tugas as $p)
         {{$p->siswa_id}}
    @endforeach
@endsection