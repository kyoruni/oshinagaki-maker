<div class="card">
    <div class="card-header">メニュー</div>
        <div class="card-body">
            <div class="card-text">
                <i class="fas fa-home"></i>&nbsp;<a href="/">ダッシュボード</a>
            </div>
            <div class="card-text">
                <i class="fas fa-cog"></i>&nbsp;{!! link_to_route('user.setting',  '個人設定', ['id' => Auth::id()]) !!}
            </div>
            <div class="card-text">
                <i class="fas fa-image"></i>&nbsp;{!! link_to_route('image.upload',  '画像登録', [], ['class' => 'card-text']) !!}
            </div>
        </div>
</div>