@extends('layouts.template')
@section('title','Report')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Report</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-striped">
                        <thead>
                            <th>No</th>
                            <th>Report Name</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>All Items</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Borrow</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Broken Items</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Items From Old</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jangka</td>
                                <td class="text-center">
                                    <a href="{{ route('report.createjangka') }}" class="btn btn-success">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Newest Items</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success">View</a>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop