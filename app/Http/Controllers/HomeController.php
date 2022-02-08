<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function list(){
        $article = Article::all();
        $category = Category::all();
        return view('home', ['article'=>$article, 'category'=>$category]);
    }
}
