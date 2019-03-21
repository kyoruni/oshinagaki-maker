@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <aside class="col-sm-4">
            {{ Auth::user()->name }}
            {!! link_to_route('user.setting', '個人設定', ['id' => Auth::id()]) !!}
        </aside>
        <div class="col-sm-8">
            @if (count($images) > 0)
                @include('images.images', ['images' => $images])
            @endif
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>お品書きメーカー（仮）</h1>
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection