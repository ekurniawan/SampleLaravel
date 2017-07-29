@extends('layouts.mylayout')

@section('menu1')
    <p><a href="{{ action('SiswaController@index') }}">Guru Menu 1</a></p>
    <p><a href="{{ route('admin.siswa') }}">Guru Menu 2</a></p>
    <p><a href="#">Guru Menu 3</a></p>
@endsection

@section('content')
    <h2>Selamat Datang di Sekolah Green School</h2>
    <p>Hello !!!</p>
@endsection