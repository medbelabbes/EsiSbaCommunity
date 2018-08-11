<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Comment;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function store(Request $request)
    {

        Auth::User()->comment()->create([
            'content' => request('content'),
            'vote' => request('vote'),
            'commentable_id' => request('commentable_id'),
            'commentable_type' => request('commentable_type'),
        ]);

        return Redirect::back()->with('message', 'Modifié avec succes');
    }

    public function destroy($id)
    {
        $comment= Comment::findOrFail($id);
        $comment->delete();
        return redirect::back()->with('message', 'Supprimer avec success');
    }

}
