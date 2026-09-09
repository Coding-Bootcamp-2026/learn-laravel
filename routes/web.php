<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


// Route View
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/greeting', function () {
//     return view('greeting');
// });

Route::view('/greeting', 'test');

// Route Parameter
Route::get('/user/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('/posts/{post}/comments/{comment?}', function ($post, $comment = 1) {
    return 'Kamu mengakses postingan id ' . $post . ' Kemudian membuka komen id ' . $comment . " yang isinya: Wah keren banget!";
});

// Route Name
Route::get('/user/profile', function () {
    return 'Ini adalah halaman user profile';
})->name('profile');

// Route Group
Route::prefix('user')->group(function () {
    Route::get('/', function () {
        return 'User Home';
    });

    Route::get('/profile', function () {
        return 'User Profile';
    });
});

// Route Fallback
Route::fallback(function () {
    return view('greeting');
});

Route::get('/blogs', [BlogController::class, 'index']);
