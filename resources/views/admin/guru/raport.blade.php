
@extends('layouts.template_admin')
@section('content')

<x-alert />
                    <div class="col mb-4 mb-lg-0 text-center">
                        <div>
                            <i data-feather="book-open" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Buat raport</div>
                                <h6 class="badge badge-dark"></h6><br>
                                <!-- Button trigger modal -->
                                <form action="{{route('raport_create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <select name="semester">
                                        <option value="tengah semester 1">tengah semester 1</option>
                                        <option value="semester 1">semester 1</option>
                                        <option value="tengah semester 2">tengah semester 2</option>
                                        <option value="semester 2">semester 2</option>
                                    </select>
                                    <input type="hidden" value="4" name='kelas_id'> 
                                    <input type="submit" value="buat">
                                </form>
                        </div>
                    </div>
@endsection