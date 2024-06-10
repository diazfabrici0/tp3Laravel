<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->group(function(){
    Route::get('posts/','getIndex')->name('posts.index');
    Route::get('posts/show/{post}', 'show')->name('posts.show');
    Route::get('posts/create', 'getCreate')->name('posts.create');
    Route::post('posts.create', 'store')->name('posts.store');
    Route::get('posts/myPosts', 'getMyPosts')->name('posts.myPosts');
    Route::post('posts/eliminar/{postId}', 'eliminar')->name('posts.eliminar'); 
});



require __DIR__.'/auth.php';
