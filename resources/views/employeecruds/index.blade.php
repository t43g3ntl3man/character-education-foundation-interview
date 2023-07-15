@extends('default')

@section('content')


    <div class="pt-5 d-flex justify-content-between mb-3 gap-2">
        <h2>Dashboard</h2>
        <div>
            <a href="{{ route('employeecruds.create') }}" class=" btn btn-primary">Create</a>
            <a href="{{ route('export.pdf') }}" class=" btn btn-info">Export PDF</a>
            <a href="{{ route('export.csv') }}" class=" btn btn-info">Export CSV</a>
            <a href="{{ route('logout.perform') }}" class=" btn btn-danger">Logout</a>
        </div>
    </div>

    <table class="table" style="width: 25%">
        <thead>
            <th>Entity</th>
            <th>Count</th>
        </thead>
        <tbody>
            <tr>
                <td>Total Employess</td>
                <td>{{ $total_count }}</td>
            </tr>
            <tr>
                <td>Active Employess</td>
                <td>{{ $total_active }}</td>
            </tr>
            <tr>
                <td>In-Active Employess</td>
                <td>{{ $total_inactive }}</td>
            </tr>

        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>f_name</th>
                <th>cnic</th>
                <th>dob</th>
                <th>address</th>
                <th>experience</th>
                <th>status</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employeecruds as $employeecrud)
                <tr>
                    <td>{{ $employeecrud->id }}</td>
                    <td>{{ $employeecrud->name }}</td>
                    <td>{{ $employeecrud->f_name }}</td>
                    <td>{{ $employeecrud->cnic }}</td>
                    <td>{{ $employeecrud->dob }}</td>
                    <td>{{ $employeecrud->address }}</td>
                    <td>{{ $employeecrud->experience }}</td>
                    <td>{{ $employeecrud->status ? 'Active' : 'In-Active' }}</td>

                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('employeecruds.show', [$employeecrud->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('employeecruds.edit', [$employeecrud->id]) }}"
                                class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['employeecruds.destroy', $employeecrud->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
