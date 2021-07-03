<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.articles.index');
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request->all(),[
            'article_title' => 'required',
            'content' => 'required'
        ]);

        $article = new Article;

        if($request->thumbnail){

        }
        
        $article->article_title = $request->article_title;
        $article->content = $request->content;

        $save = $article->save();

        if($save)
        {
            return redirect()->route('admin.articles')->with('message', 'Tambah artikel berhasil!');
        }
        
    }
}
