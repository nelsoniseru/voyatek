<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Blog $blog)
    {
        return response()->json($blog->posts);
    }

    public function store(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|string|max:255',
        ]);

        $post = $blog->posts()->create($validated);

        return response()->json($post, 201);
    }

    public function show(Blog $blog, Post $post)
    {
        $post->load(['likes', 'comments']);

        return response()->json($post);
    }

    public function update(Request $request, Blog $blog, Post $post)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image_url' => 'nullable|string|max:255',
        ]);

        $post->update($validated);

        return response()->json($post);
    }

    public function destroy(Blog $blog, Post $post)
    {
        $post->delete();

          return response()->json([
            'message' => 'Post deleted successfully'
        ], 200);    
    }
}
