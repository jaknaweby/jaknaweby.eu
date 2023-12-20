<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tutorial')->with('article', new Article());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $lang, string $filename = NULL)
    {
        if (in_array($lang, ["html", "css", "javascript", "php", "sql"])) {
            $articles = Article::where('language', $lang)->get();
            $article = Article::where('language', $lang)->where('filename', $filename)->first();

            if ($article == NULL) {
                return abort(404);
            } else {
                return view('tutorialPage', ['articles' => $articles, 'article' => $article]);
            }
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
