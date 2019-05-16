@extends('layouts.template')
@section('title','Report')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Report</div>
            <div class="panel-body">
                <form action="{{ route('report.jangka') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="date_first">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="date_last">
                    </div>
                    <button class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop