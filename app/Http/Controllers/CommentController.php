<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('blog')->get();
        return view('blogs.comments', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'commenter_name' => 'required|max:100',
            'comment_text' => 'required',
        ]);

        Comment::create([
            'commenter_name' => $request->commenter_name,
            'comment_text' => $request->comment_text,
            'blog_id' => $request->blog_id,
        ]);

        return redirect()->route('blogs.detail', $request->blog_id)->with('success', 'Komentar berhasil diposting!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id)->delete();

        if(!$comment) {
            return redirect()->route('comments.index')->with('failed', 'Comment Failed to Delete!');
        }

        return redirect()->route('comments.index')->with('success', 'Comment Deleted Succesfully!');
    }
}
