@extends('layouts.template')
@section('title','Edit Item')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Item</div>
            <div class="panel-body">
                <form action="{{ route('supply.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="item_id" id="" value="{{ $data->id }}" class="" required>

                    <!-- <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}" class="" required> -->

                    <!-- <input type="hidden" name="supply_date" id="" value="{{ date('Y-m-d') }}" class="" required> -->

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" disabled id="" value="{{ old('name',$data->name) }}" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Current Total</label>
                        <input class="form-control" type="number" required name="total" value="{{ $data->total }}"
                            disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" name="total" id="" value="{{ old($data->total) }}" class="form-control" required>
                    </div>

                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('item.index') }}" class="btn btn-warning">Back to index</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop