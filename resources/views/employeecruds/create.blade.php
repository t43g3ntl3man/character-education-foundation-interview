@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif
    <h2>Create Employee</h2>

    {!! Form::open(['route' => 'employeecruds.store', 'enctype' => 'multipart/form-data']) !!}

    <div class="mb-3">
        {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('f_name', 'F_name', ['class' => 'form-label']) }}
        {{ Form::text('f_name', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('cnic', 'Cnic', ['class' => 'form-label']) }}
        {{ Form::text('cnic', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('dob', 'Dob', ['class' => 'form-label']) }}
        {{ Form::text('dob', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('address', 'Address', ['class' => 'form-label']) }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('profile', 'Profile Picture', ['class' => 'form-label']) }}
        {{ Form::file('profile_picture', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('experience', 'Experience', ['class' => 'form-label']) }}
        {{ Form::text('experience', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('status', 'Status', ['class' => 'form-label']) }}
        <br>
        {{ Form::label('status', 'Active', ['class' => 'form-label']) }}
        {{ Form::radio('status', 'enabled', ['class' => 'form-label']) }}

        {{ Form::label('status', 'inactive', ['class' => 'form-label']) }}
        {{ Form::radio('status', 'disabled', ['class' => 'form-control']) }}
    </div>


    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
