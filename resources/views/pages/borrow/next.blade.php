@extends('layouts.template')

@section('title','Cart Borrow')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('borrow.index') }}" class="btn btn-warning">Back</a>
        <br><br>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Form</div>
            <div class="panel-body">
                <form action="{{ route('borrow_detail.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="borrow_id" value="{{ $data->id }}">

                    <div class="form-group">
                        <label for="">Borrower</label>
                        <input type="text" id="" value="{{ $data->employee->name }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Borrow Date</label>
                        <input type="date" id="" value="{{ $data->borrow_date }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Item</label>
                        <select name="item_id" id="" class="form-control" required>
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} - Stok : {{ $item->total }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" id="" value="" class="form-control" name="total" required>
                    </div>

                    <button class="btn btn-success">Input to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Cart</div>
            <div class="panel-body">
                <table class="table table-nowrap table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->cart as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td class="text-center">
                                    <a href="{{ route('borrow_detail.destroy', $field) }}" class="btn btn-danger">Cancel</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
                @if(count($data->cart) > 0)
                    <form action="{{ route('borrow.update',$data) }}" method="post">
                        @csrf @method('patch')
                        <button class="btn btn-warning btn-block">Done</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop