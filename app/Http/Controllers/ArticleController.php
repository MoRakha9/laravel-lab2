<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    
    public function Alist($id){
        $article = Article::all();
        return view('showArticle', ['article'=>$article, 'id'=>$id]);
    }

    public function insert($d){
        
        return view('insert',['d'=>$d]);
    }

    public function updatePage($d, $id){
        $id = (int)$id;
        $data = Article::find($id);
        return view('insert',['d'=>$d, 'id'=>$id, 'data'=>$data]);

    }

    public function save(Request $requist){

        $Article = new Article;
        $id;
        $category = category::all();
        foreach ($category as $cat){
            if(strtoupper($requist['name']) === strtoupper($cat['name'])){
                $id = $cat['id'];
            }
        }
        $Article->name = $requist->name;
        $Article->slug = $requist->slug;
        $Article->details = $requist->details;
        $Article->is_used = true;
        $Article->category_id = $id;
        $Article->save();
        return redirect("/showArticle/{$id}");
    }

    public function delete($id,$C_id){

        $article = Article::where('id','=',$id)->get();

        if($article){
            $article->each->delete();
        }
        return redirect("/showArticle/{$C_id}");

    }

    public function update(Request $requist){
        $Article = Article::find($requist->id);
        $id;
        $category = category::all();
        foreach ($category as $cat){
            if(strtoupper($requist['name']) === strtoupper($cat['name'])){
                $id = $cat['id'];
            }
        }
        $Article->name = $requist->name;
        $Article->slug = $requist->slug;
        $Article->details = $requist->details;
        $Article->is_used = true;
        $Article->category_id = $id;
        $Article->save();
        return redirect("/showArticle/{$id}");
    }
    
    //
}
