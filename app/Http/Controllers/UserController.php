<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;

        // Ambil semua data di tabel users
        $users = User::with('phone')->where('name', 'LIKE', '%'.$name.'%')->orderBy('created_at')->paginate(10);

        return view('users.index', ['users' => $users, 'name' => $name]);
    }
}
