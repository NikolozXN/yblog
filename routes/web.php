<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;

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

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::prefix('posts')->name('posts.')->middleware('auth')->controller(AuthorController::class)->group(function () {

    Route::get('create', 'create')->name('create');

    Route::post('', 'store')->name('store');

    Route::get('{post:slug}/edit', 'edit')->name('edit');

    Route::put('{post:slug}', 'update')->name('update');

    Route::delete('{post:slug}', 'destroy')->name('delete');

    Route::get('manage', 'manage')->name('manage');
});

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('auth')->group(function () {

    Route::post('logout', [UserController::class, 'logout'])->name('users.logout');

    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');

    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.delete');

    Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::delete('posts/{post:slug}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');
});



Route::middleware('guest')->name('users.')->controller(UserController::class)->group(function () {

    Route::get('register', 'registerView')->name('register');

    Route::post('register', 'store')->name('store');

    Route::get('login', 'loginView')->name('loginview');

    Route::post('login', 'login')->name('login');
});

//about
Route::get('/about', function () {
    return view('about');
})->name('about');


//admin


Route::prefix('admin')->name('admin.')->controller(AdminController::class)->middleware(['auth', 'can:admin'])->group(function () {

    Route::get('', 'index')->name('user');

    Route::get('/posts', 'showPosts')->name('posts');

    Route::get('/feedbacks', 'showFeedbacks')->name('feedbacks');

    Route::get('/categories', 'manageCategory')->name('categories.manage');

    Route::post('/categories/store', 'createCategory')->name('categories.store');

    Route::delete('/categories/{category:slug}', 'deleteCategory')->name('categories.delete');

    Route::delete('/delete/{user}', 'destroy')->name('deleteUser');
});
