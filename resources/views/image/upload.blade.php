@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>画像登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($image, ['route' => ['image.store', $image->id], 'method' => 'post', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('photo', '画像') !!}
                    {!! Form::file('photo', ['class' => 'form-control']) !!}

                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text ('title', old('title'), ['class' => 'form-control']) !!}

                    {!! Form::label('price', '価格') !!}
                    {!! Form::text ('price', old('price'), ['class' => 'form-control']) !!}

                    {!! Form::label('comment', 'コメント') !!}
                    {!! Form::text ('comment', old('comment'), ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('登録', ['class' => 'btn btn-primary mb-4', 'onclick' => 'return conf_message();']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection