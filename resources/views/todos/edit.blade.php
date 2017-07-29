@extends('layouts.main')
@section('content')

<h1>Edit TodoList</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('todos.update',['id'=>$list->id]) }}" accept-charset="UTF-8">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    @include('todos.partials._partialForm',['btnact'=>'edit'])
    <input type="submit" class="btn btn-default" value="Update">
</form>

@stop