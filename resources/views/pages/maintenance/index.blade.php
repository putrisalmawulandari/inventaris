@extends('layouts.template')

@section('title','Maintenance')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Maintenace</div>
            <div class="panel-body">
                <table class="table table-nowrap table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Borrower</td>
                            <td>Operator</td>
                            <td>Item</td>
                            <td>Total Broken</td>
                            <td>Broken Date</td>
                            <td>Fix Date</td>
                            <td>Description</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $field->borrow->employee->name }}</td>
                                <td>{{ $field->borrow->user->name }}</td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td>{{ $field->broken_date }}</td>
                                <td>{{ $field->fix_date }}</td>
                                <td>{{ $field->description }}</td>
                                <td class="text-center">
                                    @if($field->fix_date == null)
                                    <a href="{{ route('maintenance.show', $field) }}" class="btn btn-warning">Fix</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop