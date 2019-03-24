@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><img src="{{ asset($image->path) }}" width=100></h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <p>タイトル：{!! $image->title !!}</p>
            <p>価格：{!! $image->price !!}</p>
            <p>コメント：{!! $image->comment !!}</p>
        </div>
    </div>
@endsection