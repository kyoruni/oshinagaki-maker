<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'   => 'max:100',
            'price'   => 'digits_between:0,5',
            'comment' => 'max:100',
            'photo'   => 'max:5000|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.max'            => 'タイトルは全角100文字以内で入力してください。',
            'price.digits_between' => '価格は整数5桁以内で入力してください。',
            'comment.max'          => 'コメントは全角100文字以内で入力してください。',
            'photo.max'            => '5MB以下のファイルを選択してください。',
            'photo.mimes'          => '選択できる画像はJPEG・JPG・PNG形式のみです。',
        ];
    }
}
