<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MessagesController; // ✅ adicionado

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::delete('/user/{user}/remove-photo', [UserController::class, 'removePhoto'])->name('user.removePhoto');
    Route::resource('user', UserController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('posts', PostController::class)->except(['show']);
    Route::get('/posts/user', [PostController::class, 'userPosts'])->name('posts.userPosts');
    Route::post('/posts/undo-delete', [PostController::class, 'undoDelete'])->name('posts.undoDelete');
    Route::patch('/posts/{post}/toggle-status', [PostController::class, 'toggleStatus'])->name('posts.toggleStatus');
    Route::post('/users/{id}/review', [UserReviewController::class, 'store'])->name('users.review');
    Route::delete('/reviews/{id}', [UserReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/reviews/undo-delete', [UserReviewController::class, 'undoDelete'])->name('reviews.undoDelete');
    Route::post('/user/{user}/undo-remove-photo', [UserController::class, 'undoRemovePhoto'])->name('user.undoRemovePhoto');
    Route::get('/favoritos', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/posts/{post}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('posts.favorite');
    Route::get('/messages/{user}', [HomeController::class, 'contact'])->name('messages.contact');
    Route::post('/messages/{user}/send', [MessagesController::class, 'sendEmail'])->name('messages.send');
});
