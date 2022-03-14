<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function (){
    Route::resource('communities', CommunityController::class);
    Route::resource('communities.posts', \App\Http\Controllers\CommunityPostController::class);
    Route::get('posts/{post_id}/vote/{vote}', [\App\Http\Controllers\CommunityPostController::class, 'vote'])->name('post.vote');
});


