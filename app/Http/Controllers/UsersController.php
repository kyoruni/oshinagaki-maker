<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class UsersController extends Controller
{
    // 個人設定画面
    public function show($id)
    {
        $user = User::find($id);

        return view('user.setting', [
            'user' => $user,
        ]);
    }

    // ユーザ情報変更
    public function update(Request $request, $id)
    {
        $user    = User::find($id);
        $message = '';

        if (\Auth::id() == $user->id) {
            $user->email = $request->email;
            $user->save();

            $message = 'ユーザ情報の変更が完了しました。';
        }
        return back()->with('flash_message', $message);
    }

    // ユーザ情報削除(退会)
    public function destroy()
    {
        
    }
}
