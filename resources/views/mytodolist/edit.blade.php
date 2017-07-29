@extends('layouts.mylayout')

@section('menu1')
    @include('layouts.menu1')
@endsection

@section('content')
<h2>Edit TodoList Form</h2><br/>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('mytodolist.update',['id'=>$list->id]) }}">
    {{ method_field('PUT') }}
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name :</label>
        <input name="name" id="name" type="text" class="form-control" value="{{ $list->name }}" />
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
    <input type="checkbox" name="complete" {{ $list->complete==1?"checked":"" }} id="complete" />
    <label for="complete">Is Complete ?</label><br/>
    <button type="submit" class="btn btn-success">Edit</button>    
</form>

@endsection