@extends('layouts.template')
@section('title','User')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add Data</a>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">User</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-striped">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach($data as $field)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $field->name }}</td>
                                <td>{{ $field->email }}</td>
                                <td>{{ $field->level->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.edit',$field) }}" class="btn btn-info btn-block">Edit</a>
                                    <form action="{{ route('user.destroy',$field) }}" method="post">
                                        @csrf @method('delete')
                                        <button class="btn btn-danger btn-block">Delete</button>
                                    </form>                              
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