@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <video src="{{ asset('video.mp4') }}" controls width="100%"></video>
           <audio src="{{ asset('video.mp4') }}" controls width="100%"></audio>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('ss.png') }}" alt="" width="100%">
        </div>
    </div>
</div>
@endsection
