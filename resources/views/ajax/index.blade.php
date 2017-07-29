@extends('layouts.main')

@section('mystyle')
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
@stop

@section('content')
    <h2>Daftar Products</h2>

    <div id="jsGrid" class='table table-striped'></div>
@stop

@section('myjs')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <script src="{{asset('js/jsgridajax.js')}}"></script>
@stop