<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




// Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Verify User
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');




// ---- Tasks
// Task 1.1
Route::get('/task-1-1', [TasksController::class, 'one'])->name('task.one');

// Task 1.2
Route::get('/task-1-2', [TasksController::class, 'one_two'])->name('task.one_two');
Route::post('/task-1-2-submit', [TasksController::class, 'one_two_submit'])->name('task.one_two_submit');

// Task 1.3
Route::get('/task-1-3', [TasksController::class, 'one_three'])->name('task.one_three');
Route::post('/task-1-3-submit', [TasksController::class, 'one_three_submit'])->name('task.one_three_submit');

// Task 2
Route::get('/task-2', function () {
    return view('task2');
})->middleware(['auth', 'verified'])->name('task.two');





// ---- Posts
// index
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');

// Create
Route::get('posts/create', [PostsController::class, 'create_form'])
     ->middleware(['auth', 'verified'])->name('posts.create');
Route::post('posts/create-action', [PostsController::class, 'create_action'])
     ->middleware(['auth', 'verified'])->name('posts.create_action');

// Edit
Route::get('posts/edit/{post_id}', [PostsController::class, 'edit'])
     ->middleware(['auth','verified','check.post.ownership','check.post.comments.count'])->name('posts.edit');
Route::post('posts/edit-action', [PostsController::class, 'edit_action'])
     ->middleware(['auth','verified','check.post.ownership','check.post.comments.count'])->name('posts.edit_action');

// Delete
Route::get('posts/delete-action/{post_id}', [PostsController::class, 'delete_action'])
     ->middleware(['auth','verified','check.post.ownership','check.post.comments.count'])->name('posts.delete_action');

// Search
Route::post('posts/search', [PostsController::class, 'search'])->name('posts.search');





// ---- Comments
// Create
Route::post('posts/comment/create-action', [CommentsController::class, 'create_action'])
     ->middleware(['auth', 'verified'])->name('posts.comments.create_action');

// Edit
Route::get('posts/comment/edit/{comment_id}', [CommentsController::class, 'edit'])
     ->middleware(['auth', 'verified','check.comment.ownership'])->name('posts.comments.edit');
Route::post('posts/comment/edit-action', [CommentsController::class, 'edit_action'])
     ->middleware(['auth', 'verified','check.comment.ownership'])->name('posts.comments.edit_action');

// Delete
Route::get('posts/comment/delete-action/{comment_id}', [CommentsController::class, 'delete_action'])
     ->middleware(['auth','verified','check.comment.ownership'])->name('posts.comments.delete_action');


require __DIR__.'/auth.php';
