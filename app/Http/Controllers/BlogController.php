<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return response()->json(Blog::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $blog = Blog::create($validated);

        return response()->json($blog, 201);
    }

    public function show(Blog $blog)
    {
        $blog->load('posts');

        return response()->json($blog);
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
        ]);

        $blog->update($validated);

        return response()->json($blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
   
        return response()->json([
            'message' => 'Blog deleted successfully'
        ], 200);    }
}
