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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($todolists as $todolist)
                <tr>
                    <td>{{ $todolist->id }}</td>
                    <td>{{ $todolist->name }}</td>
                    <td>{{ $todolist->complete==0 ? "Not Completed" : "Completed" }}</td>
                    <td><a href="{{ route('mytodolist.edit',['id'=>$todolist->id]) }}" 
                        class='btn btn-warning btn-xs'>edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('mytodolist.destroy',['id'=>$todolist->id]) }}">
                            {{ method_field('DELETE') }}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger btn-xs">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection