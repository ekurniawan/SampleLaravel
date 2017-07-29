@extends('layouts.main')
@section('content')
<h1>Hi Laravel !!</h1>
Halo {{$data['name']}} alamat email anda {{$data['email']}}

@if(isset($data['lastname']))
    {{$data['lastname']}}
@else
    <p>Tidak ada lastname</p>
@endif

<br/>

<ul>
@foreach($data as $item)
    <li>{{$item}}</li>    
@endforeach
</ul>

@stop 

