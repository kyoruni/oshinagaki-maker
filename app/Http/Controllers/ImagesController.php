<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;

use App\Http\Requests\ImageRequest;

class ImagesController extends Controller
{
    // 画像一覧(ログイン後トップページ)
    public function index()
    {
        $data = [];

        if (\Auth::check()) {
            $user = \Auth::user();
            $images = $user->images()->orderBy('created_at', 'desc')->paginate(8);

            $data = ['images' => $images,];
        }
        return view('welcome', $data);
    }

    // 画像詳細画面(個別ページ)
    public function show($id)
    {
        $image = Image::find($id);
        return view('image.show', ['image' => $image,]);
    }

    // 画像登録画面
    public function create()
    {
        $image = new Image;
        return view('image.upload', ['image' => $image,]);
    }

    // 画像登録
    public function store(ImageRequest $request)
    {
        // 新規登録時は画像ファイル必須
        $this->validate($request, [
            'photo' => 'required',]);

        $file  = $request->file('photo');

        // DB登録する各値を取得
        $title   = $request->title;
        $price   = $request->price;
        $comment = $request->comment;

        // ファイル登録処理
        $path = $this->registerimage($file);

        // 登録
        $request->user()->images()->create([
            'path'    => $path,
            'title'   => $title,
            'price'   => $price,
            'comment' => $comment,
        ]);

        $message = '登録が完了しました。';
        return redirect('/')->with('flash_message', $message);
    }

    // 画像情報変更画面
    public function edit($id)
    {
        $image = Image::find($id);
        return view('image.edit', ['image' => $image,]);
    }

    // 画像情報変更処理
    public function update(ImageRequest $request, $id)
    {
        $image          = Image::find($id);
        $image->title   = $request->title;
        $image->price   = $request->price;
        $image->comment = $request->comment;

        if ($request->hasFile('photo')){
            // 登録されているファイルを削除するため、対象のファイルパスを取得
            $filepath = public_path() . '/' . $image->path;

            // 削除対象のファイルが存在したら削除
            if (\Auth::id() === $image->user_id) {
                if (\File::exists($filepath)){
                    \File::delete($filepath);
                }
            }

            // アップロードされたファイルを取得
            $file  = $request->file('photo');

            // ファイル登録処理
            $image->path = $this->registerimage($file);
        }

        $message = '登録が完了しました。';
        $image->save();
        return back()->with('flash_message', $message);
    }

    // 画像情報削除
    public function destroy($id)
    {
        $message  = '';
        $image    = Image::find($id);

        // 削除しようとしている画像の登録ユーザーと、ログインユーザーが違う場合、ここで処理終了
        if (\Auth::id() !== $image->user_id) {
            $message = '削除はできませんでした。';
            return back()->withErrors($message);
        }

        // 削除対象のファイルパスを取得
        $filepath = public_path() . '/' . $image->path;

        // 削除対象のファイルが存在したら削除
        $image->delete();
        if (\File::exists($filepath)){
            \File::delete($filepath);
        }
        $message = 'ファイルを削除しました。';
        return redirect('/')->with('flash_message', $message);
    }

    // 画像登録処理
    private function registerimage($file)
    {
        $filename = $this->getfilename($file);
        $path     = "images/" . $file->storeAs('', $filename);

        return $path;
    }

    // ファイル名作成
    private function getfilename($file)
    {
            // アップロードされたファイルの拡張子を取得
            $ext = $file->getClientOriginalExtension();

            // ランダム文字列でファイル名を作成
            $filename = uniqid() . ".$ext";

            return $filename;
    }
}
