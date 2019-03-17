@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
        {!! link_to_route('user.setting', '個人設定', ['id' => Auth::id()]) !!}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>お品書きメーカー（仮）</h1>
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection