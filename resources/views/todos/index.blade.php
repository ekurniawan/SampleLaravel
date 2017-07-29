@extends('layouts.main')
@section('content')
<h1>Daftar List</h1>

@if(session('status'))
    <div class="alert alert-success">
         {{ session('status') }}
    </div>
@endif

 @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> 
@endif

<a href="{{ route('todos.create') }}" class="btn btn-success btn-xs">Create New TodoList</a>
<br><br>


    @foreach($todo_lists as $list)
    <h4><a href="{{ route('todos.show',['id'=>$list->id]) }}">{{ $list->name }}</a></h4>
    <ul class="list-unstyled list-inline">
        <li>
            <a href="{{ route('todos.edit',['id'=>$list->id]) }}" class="btn btn-warning btn-xs">update</a>
        </li>
        <li>
            <form method="POST" action="{{ route('todos.destroy',['id'=>$list->id]) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
            </form>
        </li>
    </ul><br>
    @endforeach



@stop