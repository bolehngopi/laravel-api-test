<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the all of articles.
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json([$articles, 'message' => 'success'], 200);
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        if ($article) {
            return response()->json([$article, 'message' => 'success'], 201);
        }

        return response()->json(['message' => 'failed'], 500);
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        return response()->json($article, 200);
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article)
    {
        $update = $article->update($request->all());

        if ($update) {
            return response()->json($article, 200);
        }

        return response()->json(['message' => 'Update failed'], 500);
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article)
    {

        $deleted = $article->delete();

        if ($deleted) {
            return response()->json(['message' => 'Deletion success'], 200);
        }

        return response()->json(['message' => 'Deletion failed'], 500);
    }
}
