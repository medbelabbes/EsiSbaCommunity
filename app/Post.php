<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
