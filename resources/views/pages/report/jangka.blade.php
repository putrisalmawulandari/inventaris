@extends('layouts.template')
@section('title','Report')

@section('content')
<div class="row">
    <div class="col-md-12">
    <h1>Data Dari Tanggal {{ $date_first }} sampai {{ $date_last }}</h1>
        <div class="panel panel-default">
            <div class="panel-heading">Report</div>
            <div class="panel-body">
                <table class="table table-nowrap table-striped">
                    <thead>
                        <th>No</th>
                        <th>Borrower</th>
                        <th>Operator</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($data as $field)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $field->employee->name }}</td>
                            <td>{{ ($field->user == null) ? '' : $field->user->name }}</td>
                            <td>{{ $field->borrow_date }}</td>
                            <td>{{ $field->return_date }}</td>
                            <td>{{ $field->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop