<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/edit_post/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('edit.post');
    Route::post('/add_post', [App\Http\Controllers\PostController::class, 'store'])->name('store.post');
    Route::post('/update_post/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('update.post');
    Route::delete('/delete_post/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete.post');
});
