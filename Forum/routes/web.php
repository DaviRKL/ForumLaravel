<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/users/create', [UserController::class, 'createUser'])->name('creteUser');

Route::get('/users/id', [UserController::class, 'listUserById'])->name('listUserById');

Route::get('/users/id/edit', [UserController::class, 'createUser'])->name('createUser');

Route::get('/users/id/delete', [UserController::class, 'editUser'])->name('editUser');

Route::get('/login', [UserController::class, 'deleteUser'])->name('deleteUser');

Route::get('/logout', [UserController::class, 'listAllUsers'])->name('listAllUsers');

