<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

    Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('editUser');

    Route::get('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
});
