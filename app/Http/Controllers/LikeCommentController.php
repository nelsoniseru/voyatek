<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;

class LikeCommentController extends Controller
{
    public function like(Request $request, Post $post)
    {
        $like = Like::firstOrCreate([
            'post_id' => $post->id,
        ]);

        return response()->json($like, 201);
    }

    public function comment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $post->comments()->create([
            'content' => $validated['content'],
        ]);

        return response()->json($comment, 201);
    }
}
