<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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


Route::post('posts/{post}/comment', [CommentController::class, 'store'])->name('postcomment');
Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('indexx');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('showcreate', 'showcreate')->name('showcreate');
    Route::get('posts', 'index')->name('index');
    Route::get('showedit/{post}', 'showedit')->name('showedit');

    Route::post('/create', 'store')->name('store');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    Route::patch('/editpost/{post}/', 'update')->name('update');

    Route::get('/download/{id}', 'download')->name('download');
    Route::get('/downloads', 'downloads')->name('downloads');
});


Route::controller(AuthController::class)->middleware(['guest'])->group(function(){
    Route::post('/login',         'login')->name('loginn');
    Route::get('/login',      'showlogin')->name('login');
    Route::post('/register',   'register')->name('registerr');
    Route::get('/register','showregister')->name('register');


});

 Route::post('logout', [AuthController::class , 'logout'])->name('actionlogout')->middleware('auth');
 Route::get('/', [AuthController::class, 'index'])->name('show');
