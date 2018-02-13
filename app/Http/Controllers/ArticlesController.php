<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Illuminate\Support\Facades\Redirect;

use Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(User $user)

    {
        $articles= Article::where('user_id',$user->id)->orderBy('created_at','desc')->simplePaginate(4);
        return view('profile.blog.index', ['user'=>$user,'articles'=>$articles]);
    }




    public function show($user_id, $id )
    {
        $user = User::findOrFail($user_id);
        $article= Article::findOrFail($id);
        return view('profile.blog.show',  ['user'=>$user,'article'=>$article]);
    }


public function store(Request $request)
    {

        $this->validate($request,['titre'=>'required','content'=>'required']);

        $article = new Article;
        $article->titre = $request->input('titre');
        $article->content = $request->input('content');
        $article->user_id = Auth::User()->id;
        $article->save();

        return Redirect::back()->with('message', 'Ajouter avec succes');
    }


    public function update(Request $request)
    {
        $article= Article::find($request->id);
        $article->titre = $request['titre'];
        $article->content = $request['content'];

        $article->save();

        return Redirect::back()->with('message', 'Modifier avec succes');

    }

    public function destroy($id)
    {
        $article= Article::findOrFail($id);
        $article->delete();
        return redirect::back()->with('message', 'Supprimer avec success');
    }


}
