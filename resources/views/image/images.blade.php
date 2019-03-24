<ul class="list-unstyled">
    @foreach ($images as $image)
        <li class="media mb-3">
            <div class="media-body">
                    <a href="{!! route('image.show', $image->id) !!}"><img src="{{ asset($image->path) }}" width=100></a>
                    <p>タイトル：{!! $image->title !!}</p>
                    <p>価格：{!! $image->price !!}</p>
                    <p>コメント：{!! $image->comment !!}</p>
                    <p>パス：{!! $image->path !!}</p>
            </div>
        </li>
    @endforeach
</ul>
{{ $images->render('pagination::bootstrap-4') }}