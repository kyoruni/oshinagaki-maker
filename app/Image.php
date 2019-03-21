<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Image;;
use Illuminate\Http\Request;

class Image extends Model
{
    protected $fillable = [
        'user_id', 'path', 'title', 'price', 'comment', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
