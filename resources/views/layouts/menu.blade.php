<div class="card">
    <div class="card-header">メニュー</div>
        <div class="card-body">
            <div class="card-text">
                <i class="fas fa-home text-muted"></i>&nbsp;<a href="/">ダッシュボード</a>
            </div>
            <div class="card-text">
                <i class="fas fa-image text-muted"></i>&nbsp;{!! link_to_route('image.upload',  '新規登録', [], ['class' => 'card-text']) !!}
            </div>
            <div class="card-text text-muted">
                <i class="fas fa-cog"></i>&nbsp;{!! link_to_route('user.setting',  '個人設定', ['id' => Auth::id()]) !!}
            </div>
            <div class="card-text text-muted">
                <i class="fas fa-question-circle"></i>&nbsp;{!! link_to_route('about',  '使い方', []) !!}
            </div>
        </div>
</div>