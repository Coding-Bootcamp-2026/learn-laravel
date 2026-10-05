<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route View
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/greeting', function () {
//     return view('greeting');
// });

// Route::view('/greeting', 'test');

// Route Parameter
// Route::get('/user/{id}', function ($id) {
//     return 'User ' . $id;
// });

// Route::get('/posts/{post}/comments/{comment?}', function ($post, $comment = 1) {
//     return 'Kamu mengakses postingan id ' . $post . ' Kemudian membuka komen id ' . $comment . ' yang isinya: Wah keren banget!';
// });

// Route Name
// Route::get('/user/profile', function () {
//     return 'Ini adalah halaman user profile';
// })->name('profile');

// Route Group
// Route::prefix('user')->group(function () {
//     Route::get('/', function () {
//         return 'User Home';
//     });

//     Route::get('/profile', function () {
//         return 'User Profile';
//     });
// });

// Route Fallback
// Route::fallback(function () {
//     return view('greeting');
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/detail', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}/delete', [BlogController::class, 'destroy'])->name('blogs.destroy');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/phones', [PhoneController::class, 'index'])->name('phones.index');

        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
        Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

        Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

        Route::get('/blogs/trash', [BlogController::class, 'trash'])->name('blogs.trash');
        Route::get('/blogs/{id}/restore', [BlogController::class, 'restore'])->name('blogs.restore');
    });
});

Route::get('/blogs', [BlogController::class, 'homepage'])->name('blogs.homepage');
Route::get('/blogs/{id}', [BlogController::class, 'detail'])->name('blogs.detail');

Route::post('/comment/{blogId}', [CommentController::class, 'store'])->name('comments.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
