<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

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



Route::get('/welcome', function(){
    return view('welcome');
});





// Route::get('/view', function(){
//     return view('viewproduct');
// });


// Route::get('/uploadpage', [App\Http\Controllers\PageController::class, 'uploadpage']);

// Route::post('/uploadproduct', [App\Http\Controllers\PageController::class, 'store']);

// Route::get('/show', [App\Http\Controllers\PageController::class, 'show']);

// Route::get('/download/{file}', [App\Http\Controllers\PageController::class, 'download']);








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::get('tutorial/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::get('tutorial/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);


// comment System

Route::post('comments', [App\Http\Controllers\Frontend\CommentController::class, 'store']);
Route::post('delete-comment', [App\Http\Controllers\Frontend\CommentController::class, 'delete']);



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);

    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'] );
    Route::post('delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

    Route::get('posts', [App\Http\Controllers\admin\PostController::class, 'index']);
    Route::get('add-post', [App\Http\Controllers\admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\admin\PostController::class, 'store']);
    Route::get('post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'update']);
    Route::get('delete-post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'delete']);
    Route::get('/download/{file}', [App\Http\Controllers\admin\PostController::class, 'download']);



    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);

    Route::get('settings', [App\Http\Controllers\Admin\GeneralController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Admin\GeneralController::class, 'savedata']);

});


