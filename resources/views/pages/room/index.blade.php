@extends('layouts.template')
@section('title','Room')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('room.create') }}" class="btn btn-primary">Add Data</a>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Room</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-striped">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach($data as $field)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $field->name }}</td>
                                <td>{{ $field->description }}</td>
                                <td class="text-center">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="col-sm-4">
                                            <a href="{{ route('room.edit',$field) }}" class="btn btn-info">Edit</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <form action="{{ route('room.destroy',$field) }}" method="post">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger">Delete</button>
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