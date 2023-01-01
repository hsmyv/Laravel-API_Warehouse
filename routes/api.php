<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WarehouseProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::post('posts/{post}/comment', [CommentController::class, 'store'])->name('storee');
//Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('indexx');
//Route::get('posts', [PostController::class, 'index'])->name('index');


//Route::post('login', [AuthController::class, 'login'])->name('login');
//Route::get('login', [AuthController::class, 'show_login']);
//Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('warehouse', WarehouseController::class);
    Route::resource('product',   ProductController::class);
    Route::resource('category',  CategoryController::class);
    Route::resource('warehouseproduct', WarehouseProductController::class);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::group(['middleware' => ['auth:sanctum','role:Super-Admin','throttle:60,1']], function() {

        Route::post('update', [AuthController::class, 'update'])->middleware('permission:UpdateUser');

    });
});


Route::get('/', [AuthController::class, 'index']);
