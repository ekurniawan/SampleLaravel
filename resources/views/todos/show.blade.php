@extends('layouts.main')
@section('content')
<h2>{{{$list->name}}}</h2>
    <ul>
    @foreach($items as $item)
        <li>{{ $item->content }}</li>
    @endforeach
    </ul>
<br/>
<a href="{{ route('todos.index') }}}">back</a>
@stop