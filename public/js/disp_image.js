function draw_image(path, title, comment, price)
{
      var image = new Image();
      image.src = path;

      // 画像(image)の読み込みが完了したら、描画処理に入る
      image.onload = function(){
        var ctx = document.getElementById("cv1").getContext("2d");

        // 読み込んだ画像を表示する
        // 引数4個：元画像を縮小して表示 image, x, y, width, height
        ctx.drawImage(image,0,0,500,500);

        ctx.textAlign    = "left";
        ctx.textBaseline = "top";
        ctx.fillStyle    = "blue";
        ctx.font         = "30px 'ＭＳ ゴシック'";

        // タイトルのテキストを描画 text, x, y
        ctx.fillText(title, 10, 10);

        // コメントのテキストを描画
        ctx.textAlign = "right";
        ctx.fillText(comment, 480, 450);

        // 価格のテキストを描画
        ctx.font = "24px 'ＭＳ ゴシック'";
        ctx.fillText("¥" + price, 480, 410);
      };
 //     draw();
}