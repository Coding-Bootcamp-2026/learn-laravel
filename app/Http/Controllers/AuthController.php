<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessLoginMail;
use App\Mail\LoginMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            ProcessLoginMail::dispatch($request->user(), $request->ip(), now()->toDateTimeLocalString(), $request->userAgent());

            return redirect()->intended('admin/blogs');
        }

        return back()->withErrors([
            'email' => 'Email mu gk cocok karo email sing enek ning table user',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/blogs');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function createUser(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($credentials);
        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('blogs.index');
    }
}
