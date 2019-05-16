@extends('layouts.template')
@section('title','Edit Employee')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Employee</div>
            <div class="panel-body">
                <form action="{{ route('employee.update',$data) }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Nip</label>
                        <input type="text" name="name" id="" disabled value="{{ old('nip',$data->nip) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" value="{{ old('name',$data->name) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control" required>{{ old('address',$data->address) }}</textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('employee.index') }}" class="btn btn-warning">Back to index</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop