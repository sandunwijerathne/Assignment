<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
Route::post('/cretepost', [PostController::class, 'createpost']);
Route::get('/book', [PostController::class, 'index']);
Route::get('/delete/{id}', [PostController::class, 'delete']);
Route::get('/updateview/{id}', [PostController::class, 'updateview']);
Route::post('/postupdate', [PostController::class, 'updatpost']);

Route::post('/check', [LoginController::class, 'checkLogin']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);

