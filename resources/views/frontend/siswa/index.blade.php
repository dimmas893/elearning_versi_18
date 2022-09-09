@extends('layouts.template_siswa')
@section('contents')
        <h2>selamat datang {{Auth::guard('siswa')->user()->name}}</h2>
@endsection