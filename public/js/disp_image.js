function draw_image(canvas, mode, width, height, path)
{
    var image = new Image();
    image.src = path;

      // 画像(image)の読み込みが完了したら、描画処理に入る
      image.onload = function(){
        var text = new Object();
        text.title   = '';
        text.price   = '';
        text.comment = '';

        // プレビューボタン押下時、入力されたテキストを取得
        if (mode == 'preview'){
        text = get_text();
        }

        var ctx  = document.getElementById(canvas).getContext("2d");
        ctx.clearRect(0,0,width,height);

        // 読み込んだ画像を表示する
        // 引数4個：元画像を縮小して表示 image, x, y, width, height
        ctx.drawImage(image,0,0,width,height);

        ctx.textAlign    = "left";
        ctx.textBaseline = "top";
        ctx.fillStyle    = "blue";
        ctx.font         = "30px 'ＭＳ ゴシック'";

        // タイトルのテキストを描画 text, x, y
        ctx.fillText(text.title, 10, 10);

        // コメントのテキストを描画
        ctx.textAlign = "right";
        ctx.fillText(text.comment, width-20, height-50);

        // 価格のテキストを描画
        if (mode == "preview"){
            ctx.font = "24px 'ＭＳ ゴシック'";
            ctx.fillText("¥" + text.price, width-20, height-90);
        }
      };
}

function get_text()
{
    var text = new Object();

    text.title   = document.forms.image_form.textbox_title.value;
    text.price   = document.forms.image_form.textbox_price.value;
    text.comment = document.forms.image_form.textbox_comment.value;
    return text;
}