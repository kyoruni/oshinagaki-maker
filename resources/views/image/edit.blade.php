@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            @include('layouts.menu')
        </div>
        <div class="col-sm-8">
            <div class="text-center">
                <h1>画像情報変更</h1>
 
                <canvas id="cv1" width="300" height="300" style="border:1px solid #000;"></canvas>
                <canvas id="cv2" width="300" height="300" style="border:1px solid #000;"></canvas>
                    <script>
                        window.onload = draw_image( "cv1", "original", 300, 300, "{{ asset($image->path) }}" );
                        window.onload = draw_image( "cv2", "preview",  300, 300, "{{ asset($image->path) }}" );
                    </script>
            </div>
            {!! Form::model($image, ['route' => ['image.update', $image->id], 'method' => 'put', 'files' => true, 'name' => 'image_form']) !!}
                <div class="form-group">
                    {!! Form::label('photo', '画像') !!}
                    {!! Form::file('photo', ['class' => 'form-control']) !!}

                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text ('title', old('title'), ['class' => 'form-control', 'name' => 'textbox_title',]) !!}

                    {!! Form::label('price', '価格') !!}
                    {!! Form::text ('price', old('price'), ['class' => 'form-control', 'name' => 'textbox_price',]) !!}

                    {!! Form::label('comment', 'コメント') !!}
                    {!! Form::text ('comment', old('comment'), ['class' => 'form-control', 'name' => 'textbox_comment',]) !!}
                </div>
                {!! Form::submit('登録', ['class' => 'btn btn-primary mb-4', 'onclick' => 'return conf_message();']) !!}
                <input type="button" value="preview" class="btn btn-info mb-4" onclick="draw_image('cv2', 'preview', 300, 300, '{{ asset($image->path) }}', '{!! $image->title !!}', '{!! $image->comment !!}', '{!! $image->price !!}');">
            {!! Form::close() !!}
        </div>
    </div>
@endsection