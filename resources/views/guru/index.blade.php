@extends('layouts.mylayout')

@section('menu1')
    <p><a href="{{ action('SiswaController@index') }}">Guru Menu 1</a></p>
    <p><a href="{{ route('admin.siswa') }}">Guru Menu 2</a></p>
    @if($username=="erick")
        <p><a href="#">Guru Baru</a></p>
    @else
        <p><a href="#">Guru Lama</a></p>
    @endif
@endsection
 
@section('content')
    <h2>Selamat Datang di Sekolah Green School</h2>
    <p>Hello !!!</p>
@endsection