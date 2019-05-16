@extends('layouts.template')

@section('title','Maintenance')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Maintenance</div>
            <div class="panel-body">
                <form action="{{ route('maintenance.update',$data) }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Item</label>
                        <input type="text" class="form-control" value="{{ $data->item->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Total Broken</label>
                        <input type="text" class="form-control" readonly name="total_broken" value="{{ $data->total }}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea id="" cols="30" disabled class="form-control">{{ $data->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Total Can Be Fixed</label>
                        <input type="number" class="form-control" name="total" required>
                    </div>

                    <button class="btn btn-success pull-right btn-lg">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop