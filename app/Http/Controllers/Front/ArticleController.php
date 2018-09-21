<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $id ? $article = Article::find($id) : $article = Article::all();

        return $article;
    }
}
