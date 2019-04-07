<div class="card-deck">
    @foreach ($images as $image)
        <div class="card">
            <div class="card-header">{!! $image->title !!}</div>
            <a href="{!! route('image.show', $image->id) !!}"><img src="{{ asset($image->path) }}" class="card-img-top" alt="{!! $image->title !!}"></a>
        </div>
    @endforeach
</div>
{{ $images->render('pagination::bootstrap-4') }}