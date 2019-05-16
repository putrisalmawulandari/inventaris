@extends('layouts.template')
@section('title','Add Borrow')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add Borrow</div>
            <div class="panel-body">
                <form action="{{ route('borrow.store') }}" method="POST">
                    @csrf
                    @if (Auth::guard('web')->check())
                    <div class="form-group">
                        <label for="">Operator Name</label>
                        <input type="text" name="name" id="" value="{{ Auth::user()->name }}" class="form-control"
                            required disabled>
                        <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="form-group">
                        <label for="">Employee</label>
                        <select name="employee_id" id="" class="form-control">
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    @if (Auth::guard('employee')->check())
                    <div class="form-group">
                        <label for="">Employee Name</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::guard('employee')->user()->name }}"
                            required disabled>
                        <input type="hidden" name="employee_id" id="" value="{{ Auth::guard('employee')->user()->id }}">
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="">Borrow Date</label>
                        <input type="date" class="form-control" name="borrow_date" id="" value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="form-group">
                        <label for="my-input">Total Borrow Days</label>
                        <select name="count_days" id="my-input" class="form-control">
                            <option value="1">1 Day</option>
                            <option value="3">3 Days</option>
                            <option value="7">7 Days</option>
                            <option value="30">30 Days</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('borrow.index') }}" class="btn btn-warning">Back to index</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop