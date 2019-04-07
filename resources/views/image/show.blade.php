@extends('layouts.app')

@section('content')
    <div class="text-center">
        <canvas id="cv1" width="500" height="500" style="border:1px solid #000;"></canvas>
<!--       <h1><img src="{{ asset($image->path) }}" width=400></h1> -->
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <p>タイトル：{!! $image->title !!}</p>
            <p>価格：{!! $image->price !!}</p>
            <p>コメント：{!! $image->comment !!}</p>

            {!! Form::model($image, ['route' => ['image.destroy', $image->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger mb-4', 'onclick' => 'return delete_message();']) !!}
            {!! Form::close() !!}

            {!! link_to_route('image.edit', '画像情報変更', ['id' => $image->id], ['class' => 'btn btn-primary mb-4']) !!}
        </div>
    </div>

    <script>
      var image = new Image();
      image.src = "{{ asset($image->path) }}";

      // 画像(image)の読み込みが完了したら、描画処理に入る
      image.onload = function(){
        var ctx = document.getElementById("cv1").getContext("2d");

        // 読み込んだ画像を表示する
        // 引数4個：元画像を縮小して表示 image, x, y, width, height
        ctx.drawImage(image,0,0,500,500);

        ctx.textAlign    = "left";
        ctx.textBaseline = "top";
        ctx.fillStyle    = "blue";
        ctx.font         = "30px 'ＭＳ ゴシック'";

        // タイトルのテキストを描画 text, x, y
        ctx.fillText("{!! $image->title !!}", 10, 10);

        // コメントのテキストを描画
        ctx.textAlign = "right";
        ctx.fillText("{!! $image->comment !!}", 480, 450);

        // 価格のテキストを描画
        ctx.font = "24px 'ＭＳ ゴシック'";
        ctx.fillText("¥{!! $image->price !!}", 480, 410);
      };
      draw();
    </script>

@endsection