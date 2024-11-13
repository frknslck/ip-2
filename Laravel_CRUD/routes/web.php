<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'store']);

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/{id}/read', [MessageController::class, 'read'])->name('messages.read');
Route::get('/messages/{id}/delete', [MessageController::class, 'delete'])->name('messages.delete');
Route::post('/messages/{id}/update', [MessageController::class, 'update'])->name('messages.update');



