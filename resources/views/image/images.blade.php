<div class="card-deck">
    @foreach ($images as $image)
        <div class="col-sm-6 mb-2">
            <div class="card h-100">
                <div class="card-header">{!! $image->title !!}</div>
                <a href="{!! route('image.show', $image->id) !!}"><img src="{{ asset($image->path) }}" class="card-img-top" alt="{!! $image->title !!}"></a>
                <div class="card-body d-flex align-items-end">
                    {!! link_to_route('image.show', '詳細', ['id' => $image->id], ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $images->render('pagination::bootstrap-4') }}