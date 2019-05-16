@extends('layouts.template')
@section('title','Edit Type')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Type</div>
            <div class="panel-body">
                <form action="{{ route('type.update',$data) }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" value="{{ old('name',$data->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description',$data->description) }}</textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('type.index') }}" class="btn btn-warning">Back to index</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop