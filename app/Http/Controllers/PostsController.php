<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Redirect;
use Auth;



class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(User $user)

    {
        $posts= Post::where('user_id',$user->id)->orderBy('created_at','desc')->simplePaginate(4);
        return view('profile.post.index', ['user'=>$user,'posts'=>$posts]);
    }

    public function show($user_id, $id )
    {
        $user = User::findOrFail($user_id);
        $post= Post::findOrFail($id);
        $comments = $post->comments()->OrderBy('created_at','desc')->paginate(5);
        return view('profile.post.show',  ['user'=>$user,'post'=>$post,'comments'=>$comments]);
    }

    public function store(Request $request)
    {

        $this->validate($request,['content'=>'required']);

        $post = new Post;
        $post->content = $request->input('content');
        $post->user_id = Auth::User()->id;
        $post->save();

        return Redirect::back()->with('message', 'Ajouter avec succes');
    }

    public function update(Request $request)
    {
        $post= Post::find($request->id);
        $post->content = $request['content'];

        $post->save();

        return Redirect::back()->with('message', 'Modifier avec succes');

    }

    public function destroy($id)
    {
        $post= Post::findOrFail($id);
        $post->delete();
        return redirect::back()->with('message', 'Supprimer avec success');
    }


}
