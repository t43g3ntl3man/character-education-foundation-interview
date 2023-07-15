@extends('default')

@section('content')

    <p>{{ $employeecrud->name }}</p>
    <p>{{ $employeecrud->f_name }}</p>
    <p>{{ $employeecrud->cnic }}</p>
    <p>{{ $employeecrud->dob }}</p>
    <p>{{ $employeecrud->address }}</p>
    <p>{{ $employeecrud->experience }}</p>
    <img src="{{ 'http://localhost:8000/storage/' . $employeecrud->profile_picture }}"></img>
    <p>{{ $employeecrud->status }}</p>

@stop
