<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = $request->user()->posts()->create($validateData);

        return response()->json([
            'status' => 'OK',
            'message' => 'Post Created Successfully!',
            'data' => $post,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'status' => 'OK',
            'message' => 'Detail Post: ' . $post->title,
            'data' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->update($validateData);

        return response()->json([
            'status' => 'OK',
            'message' => 'Post Updated Successfully!',
            'data' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Post Deleted Successfully!',
        ]);
    }
}
