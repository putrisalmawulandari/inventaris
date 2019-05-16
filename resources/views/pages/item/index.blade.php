@extends('layouts.template')
@section('title','Item')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('item.create') }}" class="btn btn-primary">Add Data</a>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Item</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-striped">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Total</th>
                            <th>Type</th>
                            <th>Room</th>
                            <th>Operator</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach($data as $field)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $field->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td>{{ $field->type->name }}</td>
                                <td>{{ $field->room->name }}</td>
                                <td>{{ $field->user->name }}</td>
                                <td class="text-center">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="col-sm-4">
                                            <a href="{{ route('supply.create',$field) }}" class="btn btn-primary">Supply</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="{{ route('item.edit',$field) }}" class="btn btn-warning btn-block">Edit</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <form action="{{ route('item.destroy',$field) }}" method="post">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger btn-block">Delete</button>
                                            </form>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop