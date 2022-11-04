<?php

use Illuminate\Support\Facades\Route;
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

Route::view('/', 'welcome')->name('home');


Route::controller(PostController::class)->group(function(){
    Route::get('showcreate', 'showcreate')->name('showcreate');
    Route::get('posts', 'index')->name('index');
    Route::get('showedit/{post}', 'showedit')->name('showedit');

    Route::post('/create', 'store')->name('store');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    Route::patch('/editpost/{post}/', 'update')->name('update');

    Route::get('/download/{id}', 'download')->name('download');
    Route::get('/downloads', 'downloads')->name('downloads');
});