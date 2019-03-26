<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;

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
    public function store(Request $request)
    {
        $file  = $request->file('photo');

        // アップロードするファイルの拡張子を取得
        $ext = $request->file('photo')->getClientOriginalExtension();

        // ランダム文字列でファイル名を作成
        $filename = uniqid() . ".$ext";

        // DB登録する各値を取得
        $path    = "images/" . $file->storeAs('', $filename);
        $title   = $request->title;
        $price   = $request->price;
        $comment = $request->comment;

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

    // 画像情報削除
    public function destroy($id)
    {
        $message = '';
        $image    = Image::find($id);

        // 削除対象のファイルパスを取得
        $filepath = public_path() . '/' . $image->path;

        // 削除対象のファイルが存在したら削除
        
            if (\Auth::id() === $image->user_id) {
                $image->delete();
                if (\File::exists($filepath)){
                    \File::delete($filepath);
                }
                $message = 'ファイルを削除しました。';
        }
        return redirect('/')->with('flash_message', $message);
    }
}
