<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index()
    {
        $data = [];

        if (\Auth::check()) {
            $user = \Auth::user();
            $images = $user->images()->orderBy('created_at', 'desc')->paginate(8);

            $data = [
                'images' => $images,
            ];
        }
        return view('welcome', $data);
    }
}
