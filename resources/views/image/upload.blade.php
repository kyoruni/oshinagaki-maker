@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-4">
                @include('layouts.menu')
            </div>
            <div class="col-sm-8">
                <div class="text-center">
                    <h1>画像登録</h1>
                </div>
                {!! Form::model($image, ['route' => ['image.store', $image->id], 'method' => 'post', 'files' => true]) !!}
                    @include('image.form')

                    <div class="form-group">
                        {!! Form::label('title', 'タイトル') !!}
                        {!! Form::text ('title', old('title'), ['class' => 'form-control']) !!}

                        {!! Form::label('price', '価格') !!}
                        {!! Form::text ('price', old('price'), ['class' => 'form-control']) !!}

                        {!! Form::label('comment', 'コメント') !!}
                        {!! Form::text ('comment', old('comment'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-6 float-right" style="margin-right:-15px">
                        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block', 'onclick' => 'return conf_message();']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection