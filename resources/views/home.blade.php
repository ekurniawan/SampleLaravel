@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
       <h2>Selamat Datang di Website Laravel</h2>
       <p>Nama anda adalah {{ $username->name }} dan email anda {{ $username->email }}</p>
       <a href="{{ route('logout') }}">logout</a>
    </div>  
</div>
@stop
