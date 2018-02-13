<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitationmail extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key');
    }
}
