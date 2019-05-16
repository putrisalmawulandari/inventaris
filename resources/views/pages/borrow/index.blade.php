@extends('layouts.template')
@section('title','Borrow')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('borrow.create') }}" class="btn btn-success">Add New Data</a>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Borrow</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-striped">
                        <thead>
                            <th>No</th>
                            <th>Borrower</th>
                            <th>Operator</th>
                            <th>Borrow Date</th>
                            <th>Return Date</th>
                            <th>Remaining Days</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach($data as $field)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $field->employee->name }}</td>
                                <td>{{ ($field->user == null) ? '' : $field->user->name }}</td>
                                <td>{{ $field->borrow_date }}</td>
                                <td>{{ $field->return_date }}</td>
                                <td>
                                    @php
                                        $today = Carbon\Carbon::now();
                                        $last  = new Carbon\Carbon($field->return_date);

                                        $remaining = $today->diffInDays($last);
                                    @endphp
                                    {{ $remaining + 1 }}
                                </td>
                                <td>{{ $field->status }}</td>
                                <td class="text-center">
                                    <!-- Tombol Komen -->
                                    <a href="{{ route('borrow.detail',$field) }}" class="btn btn-block btn-info">Detail</a>  

                                    <!-- Jika Status Pinjam Uncomplete yang input si admin -->
                                    @if ($field->status == "uncomplete" && $field->approve == "1" && $field->user != null)
                                    <a href="{{ route('borrow.show',$field) }}" class="btn btn-block btn-success">Choose Items</a>           
                                    @endif

                                    <!-- Jika Si employee mau booking namun belum selesai -->
                                    @if ($field->status == "uncomplete" && $field->approve == "0" && $field->user == null)
                                    <a href="{{ route('borrow.show',$field) }}" class="btn btn-block btn-success">Choose Items</a> 
                                    @endif

                                    <!-- Menu Untuk Admin -->
                                    @if (Auth::guard('web')->check())
                                        @if ($field->status == "borrowed" && (Auth::user()->level->name == "admin" || Auth::user()->level->name == "operator"))
                                        <a href="{{ route('borrow_detail.show',$field) }}" class="btn btn-danger   btn-block">Return</a>
                                        @endif
                                        <!-- Jika Status Peminjaman Borrowed dan user yang sedang login admin atau operator -->
                                        @if ($field->status == "book" && (Auth::user()->level->name == "admin" || Auth::user()->level->name == "operator"))
                                        <form action="{{ route('borrow.destroy',$field) }}" method="POST">
                                            @csrf @method('delete')
                                            <input type="hidden" value="1" name="approve">
                                            <button class="btn btn-success btn-block">Approve</button>
                                        </form>
                                        <form action="{{ route('borrow.destroy',$field) }}" method="post">
                                            @csrf @method('delete')
                                            <input type="hidden" value="0" name="approve">
                                            <button class="btn btn-danger btn-block">Denied</button>
                                        </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop