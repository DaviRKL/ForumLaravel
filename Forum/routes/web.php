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

Route::get('/posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');

Route::middleware('auth')->group(function () {

    // Users
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');
    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('listUserById');
    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');
    Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');

    // Posts
    Route::match(['get', 'post'], '/posts/createPost', [PostController::class, 'createPost'])->name('createPost');
    Route::get('/posts/{id}', [PostController::class, 'listPostById'])->name('listPostById');
    Route::put('/posts/{id}/update', [PostController::class, 'updatePost'])->name('updatePost');
    Route::delete('/posts/{id}/delete', [PostController::class, 'deletePost'])->name('deletePost');

    // Topics
    Route::match(['get', 'post'], '/topics/createTopic', [TopicController::class, 'createTopic'])->name('createTopic');
    Route::get('/topics', [TopicController::class, 'listAllTopics'])->name('listAllTopics');
    Route::get('/topics/{id}', [TopicController::class, 'listTopicById'])->name('listTopicById');
    Route::put('/topics/{id}/update', [TopicController::class, 'updateTopic'])->name('updateTopic');
    Route::delete('/topics/{id}/delete', [TopicController::class, 'deleteTopic'])->name('deleteTopic');

    // Tags
    Route::match(['get', 'post'], '/tags/createTag', [TagController::class, 'createTag'])->name('createTag');
    Route::get('/tags', [TagController::class, 'listAllTags'])->name('listAllTags');
    Route::get('/tags/{id}', [TagController::class, 'listTagById'])->name('listTagById');
    Route::put('/tags/{id}/update', [TagController::class, 'updateTag'])->name('updateTag');
    Route::delete('/tags/{id}/delete', [TagController::class, 'deleteTag'])->name('deleteTag');

    // Categories
    Route::match(['get', 'post'], '/categories/createCategory', [CategoryController::class, 'createCategory'])->name('createCategory');
    Route::get('/categories', [CategoryController::class, 'listAllCategories'])->name('listAllCategories');
    Route::get('/categories/{id}', [CategoryController::class, 'listCategoryById'])->name('listCategoryById');
    Route::put('/categories/{id}/update', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

    // Comments
    Route::match(['get', 'post'], '/comments/create', [CommentController::class, 'createComment'])->name('createComment');
    Route::get('/comments', [CommentController::class, 'listAllComments'])->name('listAllComments');
    Route::get('/comments/{id}', [CommentController::class, 'viewComment'])->name('viewComment');
    Route::put('/comments/{id}/update', [CommentController::class, 'updateComment'])->name('updateComment');
    Route::delete('/comments/{id}/delete', [CommentController::class, 'deleteComment'])->name('deleteComment');
});
