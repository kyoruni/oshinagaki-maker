@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-4">
                @include('layouts.menu')
            </div>
            <div class="col-sm-8">
                <div class="text-center">
                    <canvas id="cv1" width="500" height="500" style="border:1px solid #000;"></canvas>
                    <script>
                        window.onload = draw_image( "cv1", "show", 500, 500, "{{ asset($image->path) }}", "{!! $image->title !!}", "{!! $image->price !!}", "{!! $image->comment !!}" );
                    </script>

                    <div class="d-flex justify-content-around">
                        {!! Form::model($image, ['route' => ['image.destroy', $image->id], 'method' => 'delete']) !!}
                            {!! Form::submit('   削除   ', ['class' => 'btn btn-danger', 'onclick' => 'return delete_message();']) !!}
                        {!! Form::close() !!}

                        {!! link_to_route('image.edit', '画像情報変更', ['id' => $image->id], ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
@endsection