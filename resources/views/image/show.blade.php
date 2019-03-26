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

            {!! Form::model($image, ['route' => ['image.destroy', $image->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger mb-4', 'onclick' => 'return delete_message();']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection