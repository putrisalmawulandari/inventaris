@extends('layouts.template')

@section('title','Return')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('borrow.index') }}" class="btn btn-warning">Back to Index</a>
        <br><br>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Return of item</div>
    <div class="panel-body">
        <form action="{{ route('borrow_detail.update',$data) }}" method="post">
            @csrf @method('patch')
            <table class="table table-nowrap table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Total</th>
                        <th class="text-center">Total Broken</th>
                        <th class="text-center">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->cart as $field)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            {{ $field->item->name }}
                            <input type="hidden" name="item_id[]" id="" value="{{ $field->item_id }}">
                        </td>
                        <td>
                            {{ $field->total }}
                            <input type="hidden" name="total[]" id="" value="{{ $field->total }}">
                        </td>
                        <td>
                            <input type="number" name="total_broken[]" id="0" class="form-control">
                        </td>
                        <td>
                            <textarea name="description[]" id="" rows="1" class="form-control"></textarea>
                            <!-- <input type="text" name="description[]" id="" class="form-control"> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <button class="btn btn-success pull-right btn-lg">Return Item</button>
        </form>

    </div>
</div>
@stop