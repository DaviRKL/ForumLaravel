<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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
Route::get('/', [AuthController::class, 'teste'])->name('teste');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');

Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');

    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('listUserById');

    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');

    Route::get('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/Posts/{id}', [PostController::class, 'listPostById'])->name('listPostById');

    Route::put('/Posts/{id}/update', [PostController::class, 'updatePost'])->name('updatePost');

    Route::get('/Posts/{id}/delete', [PostController::class, 'deletePost'])->name('deletePost');

    Route::match(['get', 'post'], '/createPost', [PostController::class, 'createPost'])->name('createPost');

    Route::get('/Posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');
});
