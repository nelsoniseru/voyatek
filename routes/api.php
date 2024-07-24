<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeCommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => 
['api', 'verify.token']],
 function () {
    Route::get('blogs', [BlogController::class, 'index']);
    Route::post('blogs', [BlogController::class, 'store']);
    Route::get('blogs/{blog}', [BlogController::class, 'show']);
    Route::put('blogs/{blog}', [BlogController::class, 'update']);
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy']);
    
    Route::get('blogs/{blog}/posts', [PostController::class, 'index']);
    Route::post('blogs/{blog}/posts', [PostController::class, 'store']);
    Route::get('blogs/{blog}/posts/{post}', [PostController::class, 'show']);
    Route::put('blogs/{blog}/posts/{post}', [PostController::class, 'update']);
    Route::delete('blogs/{blog}/posts/{post}', [PostController::class, 'destroy']);
    
    
    Route::post('posts/{post}/like', [LikeCommentController::class, 'like']);
    Route::post('posts/{post}/comment', [LikeCommentController::class, 'comment']);
});





