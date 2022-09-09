@extends('layouts.template_guru')
@section('contents')
    <h2>selamat datang {{Auth::guard('guru')->user()->name}}</h2>
@endsection