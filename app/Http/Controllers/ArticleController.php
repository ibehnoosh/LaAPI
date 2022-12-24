<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate();
        return response()->json([
            'data' => $articles,
            'meta' => [
                'count'=> $articles->count()
            ],
        ] , 200);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Article::create([
            'user_id'=> '1',
            'title'=> $request->title,
            'description' => $request->description,
            'image'=> $request->image
        ]);
        return response()->json([
            'message' => 'Create is Done'
        ],201);
    }

    public function show($id)
    {
        $article= Article::findOrFail($id);
        return response()->json([
            'data' => $article
        ],
            200
        );
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $article= Article::findOrFail($id);
        $article->update($request->all());
        return response()->json([
            'message' => 'Updated is Done'
        ],
            204
        );
    }

    public function destroy($id)
    {
        $article= Article::findOrFail($id)->delete();
        return response()->json([
            'message' => 'deleted is Done'
        ],
            200
        );
    }


}
