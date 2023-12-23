<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TodoController::class, 'index']);

Route::get('/register', [UserController::class, 'create']);

Route::post('/user', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/store-note', [TodoController::class, 'store']);

Route::delete('/note/{note}/delete', [TodoController::class, 'destory']);
