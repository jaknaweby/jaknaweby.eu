<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Article;
use \Illuminate\Validation\ValidationException;
use \App\Rules;
use Illuminate\Http\RedirectResponse;

class ArticleManagementController extends Controller
{
    public function index(Request $request) {
        if ($request->edit != NULL)
            return view('articleEdit')->with('id', $request->edit);
        else
            return view('articlesDashboard');
    }

    public function addArticle(Request $request) {
        $doesExist = Article::all()->where('language', $request->language)->where('filename', $request->sublink)->first();
        
        $request->validate([
            'title' => ['string', new Rules\NoSpecialCharacters],
            'sublink' => [new Rules\Lowercase, new Rules\NoSpace, new Rules\OnlyLettersAndNumbersAndHyphen, new Rules\NoNumbers],
        ]);

        if ($doesExist != NULL)
            throw ValidationException::withMessages(['errors' => 'This article already exists']);

        $article = new Article();
        $article->title = ucfirst($request->title);
        $article->content = $request->content;
        $article->language = $request->language;
        $article->filename = $request->sublink;

        if ($request->is_published == "on")
            $article->isPublished = 1;
        else
            $article->isPublished = 0;

        $article->save();
        return redirect()->route('management');
    }

    public function editArticle(Request $request): RedirectResponse {
        if ($request->discard != NULL) {
            return redirect()->route('management');
        }

        $request->validate([
            'filename' => [new Rules\Lowercase, new Rules\NoSpace, new Rules\OnlyLettersAndNumbersAndHyphen, new Rules\NoNumbers],
            'title' => ['string', new Rules\NoSpecialCharacters]
        ]);

        $findArticle = Article::where('filename', $request->filename)->where('language', $request->language)->first();
        $article = Article::find($request->id);

        if (($request->filename != $article->filename || $request->language != $article->language) && $findArticle != NULL) {
            throw ValidationException::withMessages(['errors' => 'This article already exists']);
        } else {
            $article->title = $request->title;
            $article->filename = $request->filename;
            $article->content = $request->content;
            $article->language = $request->language;
            
            if ($request->is_published == "on") {
                $article->isPublished = 1;
            } else {
                $article->isPublished = 0;
            }
            
            $article->save();
        }
        
        return redirect()->route('management');
    }

    public function deleteArticle(Request $request) {
        Article::destroy($request->remove);
        return redirect()->route('management');
    }
}
