<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showArticle($lang, $article) {
        if ($lang == "html" || $lang == "css" || $lang == "javascript" || $lang == "php" || $lang == "sql") {
            return view('tutorialPage',['lang' => $lang, 'article' => $article]);
        } else {
            return abort(404);
        }
    }
}
