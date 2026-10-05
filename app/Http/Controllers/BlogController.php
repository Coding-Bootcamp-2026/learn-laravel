<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->title;

        // Query Builder
        // $blogs = DB::table('blogs')->where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at')->paginate(10);

        // Eloquent ORM
        $user = Auth::user();
        $blogs = Blog::when($user->role !== 'admin', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at')->paginate(10);

        return view('blog', ['blogs' => $blogs, 'title' => $title]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('blogs.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'unique:blogs', 'max:255'],
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        if ($validated) {
            // Query Builder
            // DB::table('blogs')->insert([
            //     'title' => $request->title,
            //     'deskripsi' => $request->deskripsi,
            //     'status' => $request->status,
            //     'user_id' => fake()->numberBetween(1, User::all()->count()),
            // ]);

            // Eloquent ORM
            $userId = Auth::id();
            $blog = Blog::create([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
                'user_id' => $userId,
            ]);

            $blog->tags()->attach($request->tags);

            return redirect()->route('blogs.index')->with('success', 'New Blog Added Succesfully');
        } else {
            return redirect()->route('blogs.index')->with('failed', 'New Blog Added Failed');
        }
    }

    public function show($id)
    {
        // Query Builder
        // $blog = DB::table('blogs')->where('id', $id)->first();

        // Eloquent ORM
        $blog = Blog::findOrFail($id);

        if (! $blog) {
            abort(404, 'Data tidak ditemukan');
            // return view('blogs.error');
        }

        return view('blogs.detail', ['blog' => $blog]);
    }

    public function edit($id)
    {
        // $blog = DB::table('blogs')->where('id', $id)->first();
        $blog = Blog::with('tags')->findOrFail($id);
        $tags = Tag::all();

        if (!Gate::allows('update-post', $blog)) {
            return redirect()->route('blogs.index')->with('failed', 'Tidak bisa edit blog punya orang lain');
        }

        return view('blogs.edit', ['blog' => $blog, 'tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        if ($validated) {
            // DB::table('blogs')->where('id', $id)->update([
            //     'title' => $request->title,
            //     'deskripsi' => $request->deskripsi,
            //     'status' => $request->status,
            //     'user_id' => fake()->numberBetween(1, User::all()->count()),
            //     'update_at' => now(),
            // ]);

            $userId = Auth::id();
            $blog = Blog::findOrFail($id);
            $blog->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
                'user_id' => $userId,
                'update_at' => now(),
            ]);

            // $blog->tags()->detach($blog->tags);
            // $blog->tags()->attach($request->tags);
            $blog->tags()->sync($request->tags);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog Edited Succesfully!');
    }

    public function destroy($id)
    {
        // $blog = DB::table('blogs')->where('id', $id)->delete();
        $blog = Blog::destroy($id);

        if (! $blog) {
            return redirect()->route('blogs.index')->with('failed', 'Blog failed to Delete!');
        }

        return redirect()->route('blogs.index')->with('success', 'Blog Deleted Succesfully!');
    }

    public function homepage()
    {
        $blogs = Blog::with('user')->where('status', 'Active')->latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    public function detail($id)
    {
        $blog = Blog::with(['user', 'comments', 'tags'])->findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function trash()
    {
        $blogs = Blog::onlyTrashed()->get();
        return view('blogs.restore', compact('blogs'));
    }

    public function restore($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('blogs.index')->with('success', 'Data Blog Restore Succesfully!');
    }
}
