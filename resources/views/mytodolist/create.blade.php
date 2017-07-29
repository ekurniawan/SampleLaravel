@extends('layouts.mylayout')

@section('menu1')
    @include('layouts.menu1')
@endsection

@section('content')
<h2>Insert TodoList Form</h2><br/>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('mytodolist.store') }}">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name :</label>
        <input name="name" id="name" type="text" class="form-control" placeholder="insert name" />
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
    <input type="checkbox" name="complete" id="complete" />
    <label for="complete">Is Complete ?</label><br/>
    <button type="submit" class="btn btn-success">Submit</button>    
</form>

@endsection