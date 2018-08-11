<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
