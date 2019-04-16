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
                    window.onload = draw_image( "cv1", "original", 300, 300, "{{ asset($image->path) }}", "", "", "" );
                    window.onload = draw_image( "cv2", "preview",  300, 300, "{{ asset($image->path) }}", "", "", "" );
                </script>
            </div>
            {!! Form::model($image, ['route' => ['image.update', $image->id], 'method' => 'put', 'files' => true, 'name' => 'image_form']) !!}
                @include('image.form')

                <div class="form-group">
                    {!! Form::label('title', 'タイトル') !!}&nbsp;<span id="error_text_title" class="text-danger small"></span>
                    {!! Form::text ('title', old('title'), ['class' => 'form-control', 'id' => 'form_title',]) !!}

                    {!! Form::label('price', '価格') !!}&nbsp;<span id="error_text_price" class="text-danger small"></span>
                    {!! Form::text ('price', old('price'), ['class' => 'form-control', 'id' => 'form_price',]) !!}

                    {!! Form::label('comment', 'コメント') !!}&nbsp;<span id="error_text_comment" class="text-danger small"></span>
                    {!! Form::text ('comment', old('comment'), ['class' => 'form-control', 'id' => 'form_comment',]) !!}
                </div>
                <div class="mx-auto d-flex justify-content-around">
                    <div class="col-sm-6" style="margin-right:-15px; margin-left:-15px;">
                        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block', 'onclick' => 'return conf_message();']) !!}
                    </div>
                    <div class="col-sm-6" style="margin-right:-15px; margin-left:-15px;">
                        <input type="button" value="preview" class="btn btn-info btn-block" onclick="draw_image('cv2', 'preview', 300, 300, '{{ asset($image->path) }}', '', '', '');">
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection