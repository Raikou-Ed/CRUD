<?php


use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;




Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }

    return view('home', ['posts' => $posts]);
});

Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);

//Blog post related routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);


