@extends('layouts.mylayout')

@section('menu1')
    @include('layouts.menu1')
@endsection

@section('content')
 <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Todo List</th>
                <th>Content</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($todoitems as $todoitem)
                <tr>
                    <td>{{ $todoitem->id }}</td>
                    <td>{{ $todoitem->MytodoList->name }}</td>
                    <td>{{ $todoitem->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection