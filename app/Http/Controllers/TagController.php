<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('blogs')->get();

        return view('blogs.tag', compact('tags'));
    }
}
