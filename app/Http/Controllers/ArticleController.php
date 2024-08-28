<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $updated = $article->update($request->all());

        if ($updated) {
            return response()->json($article, 200);
        }

        return response()->json(['message' => 'Update failed'], 500);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $deleted = $article->forceDelete();

        if ($deleted) {
            return response()->json(['message' => 'Article deleted'], 204);
        }

        return response()->json(['message' => 'Delete failed'], 500);
    }
}
