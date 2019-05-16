@extends('layouts.template')
@section('title','Edit User')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit User</div>
            <div class="panel-body">
                <form action="{{ route('user.update',$data) }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" value="{{ old('name',$data->name) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" disabled  name="email" id="" value="{{ old('email',$data->email) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level_id" id="" class="form-control">
                            @foreach($levels as $level)
                            @if($level->id == $level->level_id)
                            <option value="{{ $level->id }}" selected>{{ $level->name }}</option>
                            @else
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('user.index') }}" class="btn btn-warning">Back to index</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop