<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::orderBy('created_at','desc')->simplePaginate(4);
        $articles= Article::orderBy('created_at','desc')->simplePaginate(4);



        return view('home', ['articles'=>$articles,'posts'=>$posts]);
    }
}
