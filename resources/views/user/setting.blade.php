@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>個人設定</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h3>{{ $user->name }}</h3>

            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::label('email', '(半角)', ['class' => 'text-muted small']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('登録', ['class' => 'btn btn-primary mb-4', 'onclick' => 'return conf_message();']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection