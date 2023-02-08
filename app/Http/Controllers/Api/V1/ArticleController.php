<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArticleCollection;
use App\Http\Requests\AtricleRequest;
use App\Http\Resources\V1\ArticleRecource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
         return new ArticleCollection(Article::all());
    }


    public function store(AtricleRequest $request)
    {
        Article::create($request->validated());

        return response()->json('Article Created Successfuly');

    }


    public function  update(AtricleRequest $request , Article $article)
    {

        $article->updated($request->validated());
        return response()->json('Article Updated Successfuly');

    }

    public function show($id)
    {
            // dd($article);
        // return new ArticleRecource($article);
        $article = Article::find($id);
            return response()->json([
                'data' => $article
            ], 200 );
    }


    public function destroy($id)
    {


        $article = Article::destroy($id);

        if($article) {
            return response()->json([
                'data' => []
            ], 200 );
        }else {
            return response()->json([
                'data' => $article
            ], 404 );
        }

    }

}
