function draw_image(canvas, mode, width, height, path, title, price, comment)
{
    var return_flg = false;
    var image = new Image();
    image.src = path;

      // 画像(image)の読み込みが完了したら、描画処理に入る
      image.onload = function(){
        var text = new Object();

        // プレビューボタン押下時、入力されたテキストを取得
        // 画像一覧表示時、DBに表示されたテキストを取得
        // オリジナル画像表示時、テキストは取得しない
        if (mode == 'preview'){
            text.title   = document.forms.image_form.title.value;
            text.price   = document.forms.image_form.price.value;
            text.comment = document.forms.image_form.comment.value;
        }else if(mode == 'show'){
            text.title   = title;
            text.price   = price;
            text.comment = comment;
        }else {
            text.title   = '';
            text.price   = '';
            text.comment = '';
        }

        var ctx  = document.getElementById(canvas).getContext("2d");

        ctx.clearRect(0,0,width,height);

        // 読み込んだ画像を表示する
        // 引数4個：元画像を縮小して表示 image, x, y, width, height
        ctx.drawImage(image,0,0,width,height);
        return_flg = true;
        draw_text(mode,ctx,width,height,text.title,text.price,text.comment);

      };
    return return_flg;
}

function draw_text(mode,ctx,width,height,title,price,comment)
{
    var error_message     = new Object();
    error_message.title   = '';
    error_message.price   = '';
    error_message.comment = '';

    // プレビュー時、画面に入力された内容をチェック
    if (mode == 'preview'){
        error_message = check_text(title, price, comment);
    }

    ctx.textAlign    = "left";
    ctx.textBaseline = "top";
    ctx.fillStyle    = "blue";
    ctx.font         = "30px 'Hiragino Maru Gothic Pro','ヒラギノ丸ゴ Pro W4',sans-serif";

    // タイトルのテキストを描画 text, x, y
    if (error_message.title == ''){
        ctx.fillText(title, 10, 10);
    }

    ctx.textAlign = "right";

    // コメントのテキストを描画
    if (error_message.comment == ''){
        ctx.fillText(comment, width-20, height-50);
    }

    // 価格に数値が入力されている場合のみ、価格のテキストを描画
    if ((error_message.price == '') && (mode == "preview" || mode == "show")){
        if (price){
            ctx.font = "24px 'ＭＳ ゴシック'";
            ctx.fillText("¥" + price, width-20, height-90);
        }
    }
}

function check_text(title, price, comment)
{
    // 各項目のエラーメッセージ 初期値はなし
    var error_message     = new Object();
    error_message.title   = '';
    error_message.price   = '';
    error_message.comment = '';

    // 各項目の背景色 初期値は白
    var background_color     = new Object();
    background_color.title   = '#ffffff';
    background_color.price   = '#ffffff';
    background_color.comment = '#ffffff';

    // タイトルのチェック
    if (title){
        if (title.length > 100){
            error_message.title = '全角100文字以内で入力してください。';
        }

        // それぞれの項目で、エラーがあれば背景色を薄桃色にする
        if (error_message.title){
            background_color.title = '#ffcccc';
        }
    }

    // 価格のチェック
    if (price){
        if (isFinite(price) == false){
            error_message.price    = '半角数値のみ入力可能です。';
        }else if(String(price).length > 5){
            error_message.price    = '整数5桁以内で入力してください。';
        }

        // それぞれの項目で、エラーがあれば背景色を薄桃色にする
        if (error_message.price){
            background_color.price = '#ffcccc';
        }
    }

    // コメントのチェック
    if (comment){
        if (comment.length > 100){
            error_message.comment = '全角100文字以内で入力してください。';
        }

        // それぞれの項目で、エラーがあれば背景色を薄桃色にする
        if (error_message.comment){
            background_color.comment = '#ffcccc';
        }
    }

    document.getElementById('error_text_title').textContent                  = error_message.title;
    document.getElementById('error_text_price').textContent                  = error_message.price;
    document.getElementById('error_text_comment').textContent                = error_message.comment;
    document.getElementById('form_title').style.backgroundColor   = background_color.title;
    document.getElementById('form_price').style.backgroundColor   = background_color.price;
    document.getElementById('form_comment').style.backgroundColor = background_color.comment;
    return error_message;
}