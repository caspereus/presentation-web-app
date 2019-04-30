<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Visitors;
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
        $article = Article::count();
        $visitor = Visitors::count();
        $event   = Event::count();
        return view('home',compact('article','visitor','event'));
    }
}
