<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController,
    ViaCepController,
    UserController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::get('/users/posts/{id}',[PostController::class, 'show'])->name('posts.show');

Route::get('/users',[UserController::class, 'index'])->name('users.index');;
Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');;
Route::get('/users/create',[UserController::class, 'create'])->name('users.create');;
Route::post('/users',[UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
Route::put('/users/edit/{id}',[UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}',[UserController::class, 'destroy'])->name('users.destroy');

Route::get('/viacep',[ViaCepController::class, 'index'])->name('viacep.index');
Route::post('/viacep',[ViaCepController::class, 'index'])->name('viacep.index.post');
Route::get('/viacep/{cep}',[ViaCepController::class, 'show'])->name('viacep.show');