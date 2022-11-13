<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ArticleComment};
use Illuminate\Support\Facades\Validator;

class ArticleCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => ArticleComment::all()
        ]);
    }
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
            ->article_comments()
            ->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'ArticleComment created successfully',
            'data' => $article
        ], 201);
    }
    public function update(Request $request, ArticleComment $articleComment)
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
        // $article = auth()->user() //
        //     ->article_comments() // semua yang berelasi akan teeupdate
        //     ->update($request->all());
        if (auth()->user()->id !== $articleComment->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu tidak pemilik articel ini'
            ], 403);
        }
        $articleComment->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'ArticleComment created successfully',
            'data' => $articleComment
        ], 201);
    }

    public function delete(ArticleComment $articleComment)
    {
        if (auth()->user()->id !== $articleComment->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu tidak pemilik articel ini'
            ], 403);
        }
        $data = $articleComment;
        $articleComment->delete();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
