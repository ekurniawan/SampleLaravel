@extends('layouts.mylayout')

@section('menu1')
    @include('layouts.menu1')
@endsection

@section('content')
    <h2>Daftar List</h2><br/>

    @if(session('pesan'))
        <div class="alert alert-success">{{ session('pesan') }}</div>
    @endif

    <a href="{{ route('mytodolist.create') }}" class="btn btn-success btn-xs">Add TodoList</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Completed</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($todolists as $todolist)
                <tr>
                    <td>{{ $todolist->id }}</td>
                    <td>{{ $todolist->name }}</td>
                    <td>{{ $todolist->complete==0 ? "Not Completed" : "Completed" }}</td>
                    <td><a href="{{ route('mytodolist.edit',['id'=>$todolist->id]) }}">edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection