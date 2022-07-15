<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    PostController,
    ViaCepController
};

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

route::middleware(['auth'])->group(function(){
Route::get('/users',[UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');
Route::post('/create',[UserController::class, 'store'])->name('users.store');
Route::get('/create',[UserController::class, 'create'])->name('users.create');
Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
Route::put('/users/edit/{id}',[UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}',[UserController::class, 'destroy'])->name('users.destroy');

Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::get('/users/posts/{id}',[PostController::class, 'show'])->name('posts.show');
});

Route::middleware(['admin'])->group(function(){
    Route::get('/admin',[UserController::class, 'admin'])->name('admin');
});

Route::get('/viacep',[ViaCepController::class, 'index'])->name('viacep.index');
Route::post('/viacep',[ViaCepController::class, 'index'])->name('viacep.index.post');
Route::get('/viacep/{cep}',[ViaCepController::class, 'show'])->name('viacep.show');

