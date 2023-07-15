@extends('default')

@section('content')


    <table style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px;">id</th>
                <th style="border: 1px solid black; padding: 5px;">name</th>
                <th style="border: 1px solid black; padding: 5px;">f_name</th>
                <th style="border: 1px solid black; padding: 5px;">cnic</th>
                <th style="border: 1px solid black; padding: 5px;">dob</th>
                <th style="border: 1px solid black; padding: 5px;">address</th>
                <th style="border: 1px solid black; padding: 5px;">experience</th>
                <th style="border: 1px solid black; padding: 5px;">status</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($employeecruds as $employeecrud)
                <tr>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->id }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->name }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->f_name }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->cnic }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->dob }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->address }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->experience }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $employeecrud->status ? 'Active' : 'In-Active' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
