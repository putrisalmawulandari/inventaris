@extends('layouts.template')
@section('title','Add Item')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add Item</div>
            <div class="panel-body">
                <form action="{{ route('item.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" value="{{ old('name') }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" name="total" id="" value="{{ old('total') }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type_id" id="" class="form-control">
                            @foreach($types as $type)
                            @if ($type->id == $type->type_id)
                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                            @else
                            <option value="{{ $type->id }}">{{ $type->name }}</option>  
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Room</label>
                        <select name="room_id" id="" class="form-control">
                            @foreach($rooms as $room)
                            @if ($room->id == $type->room_id)
                            <option value="{{ $room->id }}" selected>{{ $room->name }}</option>
                            @else
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endif
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