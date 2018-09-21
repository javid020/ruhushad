<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id = null) {
        // if id is given, find molla by id, else get all list
        $id ? $article = Article::find($id) : $article = Article::all();

        return $article;
    }
}
