<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->title;
        $blogs = DB::table('blogs')->where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at')->paginate(10);
        return view('blog', ['blogs' => $blogs, 'title' => $title]);
    }

    public function create()
    {
        return view('blogs/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'unique:blogs', 'max:255'],
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        if ($validated) {
            DB::table('blogs')->insert([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
                'user_id' => fake()->numberBetween(1, User::all()->count()),
            ]);
        }

        return redirect()->route('blogs.index');
    }
}
