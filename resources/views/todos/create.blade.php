@extends('layouts.main')
@section('content')

<h1>Create TodoList</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('todos.store') }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    @include('todos.partials._partialForm',['btnact'=>'create'])
    <input type="submit" class="btn btn-default" value="submit">
</form>


@stop