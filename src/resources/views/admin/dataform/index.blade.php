@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Forms</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Guests</th>
                <th>Time</th>
                <th>Date</th>
                <th>Table</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataForms as $dataForm)
            <tr>
                <td>{{ $dataForm->id }}</td>
                <td>{{ $dataForm->name }}</td>
                <td>{{ $dataForm->email }}</td>
                <td>{{ $dataForm->phone }}</td>
                <td>{{ $dataForm->guests }}</td>
                <td>{{ $dataForm->time }}</td>
                <td>{{ $dataForm->date->toDateString() }}</td>
                <td>{{ $dataForm->table }}</td>
                <td>{{ $dataForm->total_price }}</td>
                <td>{{ $dataForm->status }}</td>
                <td>{{ $dataForm->created_at->toDateTimeString() }}</td>
                <td>{{ $dataForm->updated_at->toDateTimeString() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection