<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showArticle($lang, $article = "") {
        if ($lang == "html" || $lang == "css" || $lang == "javascript" || $lang == "php" || $lang == "sql") {

            if ($article != '') {
                return view('tutorialPage',['lang' => $lang, 'article' => $article, 'isIndex' => false]);
            } else {
                return view('tutorialPage',['lang' => $lang, 'article' => "Co je to " . strtoupper($lang), 'isIndex' => true]);
            }
        } else {
            return abort(404);
        }
    }
}
