@extends('layouts.template')
@section('title', 'Detail Borrow')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('borrow.index') }}" class="btn btn-warning">Back to Index</a>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Borrow Detail</div>
            <div class="panel-body">
                <table class="table table-nowrap table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->cart as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop