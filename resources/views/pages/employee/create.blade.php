@extends('layouts.template')
@section('title','Add Employee')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add Employee</div>
            <div class="panel-body">
                <form action="{{ route('employee.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nip</label>
                        <input type="text" name="nip" id="" value="{{ old('nip') }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" value="{{ old('name') }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control" required>{{ old('address') }}</textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('employee.index') }}" class="btn btn-warning">Back to index</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop