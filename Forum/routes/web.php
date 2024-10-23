<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;

Route::get('/', [Controller::class, 'welcome'])->name('welcome');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/Posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');

Route::middleware('auth')->group(function () {
    
    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'listAllUsers'])->name('listAllUsers');
        Route::get('/{id}', [UserController::class, 'listUserById'])->name('listUserById');
        Route::put('/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');
        Route::delete('/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
    });

    // Posts
    Route::prefix('Posts')->group(function () {
        Route::get('/{id}', [PostController::class, 'listPostById'])->name('listPostById');
        Route::put('/{id}/update', [PostController::class, 'updatePost'])->name('updatePost');
        Route::delete('/{id}/delete', [PostController::class, 'deletePost'])->name('deletePost');
        Route::match(['get', 'post'], '/createPost', [PostController::class, 'createPost'])->name('createPost');
    });

    // Topics
    Route::prefix('Topics')->group(function () {
        Route::get('/', [TopicController::class, 'listAllTopics'])->name('listAllTopics');
        Route::get('/{id}', [TopicController::class, 'listTopicById'])->name('listTopicById');
        Route::put('/{id}/update', [TopicController::class, 'updateTopic'])->name('updateTopic');
        Route::delete('/{id}/delete', [TopicController::class, 'deleteTopic'])->name('deleteTopic');
        Route::match(['get', 'post'], '/createTopic', [TopicController::class, 'createTopic'])->name('createTopic');
    });

    // Tags
    Route::prefix('Tags')->group(function () {
        Route::get('/', [TagController::class, 'listAllTags'])->name('listAllTags');
        Route::get('/{id}', [TagController::class, 'listTagById'])->name('listTagById');
        Route::put('/{id}/update', [TagController::class, 'updateTag'])->name('updateTag');
        Route::delete('/{id}/delete', [TagController::class, 'deleteTag'])->name('deleteTag');
        Route::match(['get', 'post'], '/createTag', [TagController::class, 'createTag'])->name('createTag');
    });

    // Categories
    Route::prefix('Categories')->group(function () {
        Route::get('/', [CategoryController::class, 'listAllCategories'])->name('listAllCategories');
        Route::get('/{id}', [CategoryController::class, 'listCategoryById'])->name('listCategoryById');
        Route::put('/{id}/update', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::delete('/{id}/delete', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        Route::match(['get', 'post'], '/createCategory', [CategoryController::class, 'createCategory'])->name('createCategory');
    });

});
