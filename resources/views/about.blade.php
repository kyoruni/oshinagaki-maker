@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            @include('layouts.menu')
        </div>
        <div class="col-sm-8">
            <div class="text-center">
                <h3>使い方</h3>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-chevron-circle-right text-muted"></i>&nbsp;何ができる？
                </div>
                <div class="card-body">
                    <ul>
                        <li>インディー活動を行っている方向けに、お品書き画像を作成することができます。</li>
                        <li>頒布物の画像とタイトル・価格・簡単な説明文を登録すると、画像に各テキストを合成した状態で表示、ダウンロードできます。</li>
                    </ul>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-chevron-circle-right text-muted"></i>&nbsp;ダッシュボード
                </div>
                <div class="card-body">
                    <ul>
                        <li>登録した画像一覧が表示されます。</li>
                        <li>画像クリックまたは詳細ボタンで、画像詳細画面へ移動します。</li>
                    </ul>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-chevron-circle-right text-muted"></i>&nbsp;画像詳細画面
                </div>
                <div class="card-body">
                    <ul>
                        <li>登録した画像に、文字入れを行った状態で表示します。</li>
                        <li>画像情報変更</li>
                        <li class="text-muted" style="list-style: none;">画像ファイルの差し替え、表示するテキストを変更することができます。</li>
                        <li class="text-muted" style="list-style: none;">プレビューボタンでは、入力したテキストを表示して登録前に確認することができます。</li>
                        <li>削除</li>
                        <li class="text-muted" style="list-style: none;">画像ファイルと、登録されているテキストを削除します。</li>
                        <li class="text-muted" style="list-style: none;">削除したデータは復元できませんので、注意して操作してください。</li>
                        
                    </ul>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-chevron-circle-right text-muted"></i>&nbsp;新規登録
                </div>
                <div class="card-body">
                    <ul>
                        <li>新規画像と、画像に表示させるテキストを登録します。</li>
                        <li>画像ファイルは.png, .jpg, .jpegのみ登録可能です。</li>
                    </ul>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-chevron-circle-right text-muted"></i>&nbsp;個人設定
                </div>
                <div class="card-body">
                    <ul>
                        <li>メールアドレスの変更を行うことができます。</li>
                        <li>退会機能は現在準備中です。</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection