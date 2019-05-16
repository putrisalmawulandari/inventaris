@extends('layouts.template')
@section('title','Edit Item')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Item</div>
            <div class="panel-body">
                <form action="{{ route('item.update',$data) }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" value="{{ old('name',$data->name) }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description',$data->description) }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" name="total" disabled id="" value="{{ old('total',$data->total) }}" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type_id" id="" class="form-control">
                            @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Room</label>
                        <select name="room_id" id="" class="form-control">
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('item.index') }}" class="btn btn-warning">Back to index</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop