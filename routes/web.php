<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');

// Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

// Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit')->middleware('auth');

// Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update')->middleware('auth');

// Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy')->middleware('auth');

// Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');
Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);
Route::resource('ideas.comments', Commentcontroller::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function(){
    return view('terms');
});

