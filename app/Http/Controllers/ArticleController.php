<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleShow;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Article\ArticleRepository;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $articleRepository;
    public function __construct()
    {
        // $this->articleRepository = $articleRepository;
        $this->middleware('auth:api');
    }

    public function index(Request $req)
    {
        $articles  = Article::paginate($req->paginate || 10);
        return response()->json([
            'success' => true,
            'data' => $articles
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                '*' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                $validator->messages()->toArray(),
            ], 422);
        }
        $article = auth()->user() //
            ->articles()
            ->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Article created successfully',
            'data' => $article
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // $this->articleRepository->detail($article);
        return response()->json([
            'success' => true,
            'data' => $article
            // 'data' => new ArticleShow($article)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                '*' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                $validator->messages()->toArray(),
            ], 422);
        }
        $article = Article::find($id);
        if (auth()->user()->id !== $article->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu tidak pemilik articel ini'
            ], 403);
        }
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        return response()->json([
            'success' => true,
            'message' => 'Article updated successfully',
            'data' => $article
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if (auth()->user()->id !== $article->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu tidak pemilik articel ini'
            ], 403);
        }
        $article->delete();
        return response()->json([
            'success' => true,
            'message' => 'Article deleted successfully'
        ]);
    }
}
