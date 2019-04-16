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
            </div>
            <div class="col-sm-9 mx-auto">
                <div class="col-sm-12">
                    <table class="table">
                        <thead></thead>
                        <tbody>
                            <tr>
                              <th scope="row">タイトル</th>
                              <td>{!! $image->title !!}</td>
                            </tr>
                            <tr>
                              <th scope="row">価格</th>
                              <td>{!! $image->price !!}</td>
                            </tr>
                            <tr>
                              <th scope="row">コメント</th>
                              <td>{!! $image->comment !!}</td>
                            </tr>
                          </tbody>
                    </table>
                </div>
                {!! link_to_route('image.edit', '画像情報変更', ['id' => $image->id], ['class' => 'btn btn-primary btn-block mb-2']) !!}

                {!! Form::model($image, ['route' => ['image.destroy', $image->id], 'method' => 'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger btn-block mb-2', 'onclick' => 'return delete_message();']) !!}
                {!! Form::close() !!}

                <a href="/"><button type="button" class="btn btn-outline-info btn-block mb-2">戻る</button></a>
            </div>
        </div>
    </div>
@endsection