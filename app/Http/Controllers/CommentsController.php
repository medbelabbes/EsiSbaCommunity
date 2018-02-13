<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = Auth::User()->comment();
        $comment->content = $request->input('content');
        $comment->commentable_id = $request->input(?);
        $comment->commentable_type = $request->input(?);
        $comment->save();

        return Redirect::back()->with('message', 'Modifié avec succes');
    }
}
