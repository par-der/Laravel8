<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // забирает последние 6 статей из бд и передает в шаблон
    public function index()
    {
//        $articles = Article::orderBy('created_at', 'DESC')->get()->take(6);
//        $articles = Article::with('state', 'tags')->orderBy('created_at', 'DESC')->take(6)->get();
        $articles = Article::lastLimit();
        return view('app.home', compact('articles'));
    }
}
