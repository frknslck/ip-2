<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/category/{id}', [NewsController::class, 'category']);
Route::get('/news/{id}', [NewsController::class, 'getNews']);
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // kullanıcılar
    Route::get('/panel', [UserController::class, 'index'])->name('panel.index');
    Route::delete('/panel/{id}', [UserController::class, 'destroy'])->name('panel.destroy');
    Route::post('/panel/promote/{id}', [UserController::class, 'promoteToAdmin'])->name('panel.promote');
    Route::put('/panel/{id}', [UserController::class, 'update'])->name('panel.update');
    // haberler 
    Route::get('/panel/search', [UserController::class, 'searchNews'])->name('panel.search');
    Route::post('/panel/news/update/{id}', [UserController::class, 'updateNews'])->name('panel.news.update');
    Route::delete('/panel/news/delete/{id}', [UserController::class, 'deleteNews'])->name('panel.news.destroy');

});

Route::resource('categories', CategoryController::class)->except(['create', 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/panel/edit', [NewsController::class, 'editNews'])->name('news.edit');
    Route::post('/panel/update/{id}', [NewsController::class, 'updateNews'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

});


require __DIR__.'/auth.php';
