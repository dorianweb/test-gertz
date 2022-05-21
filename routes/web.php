<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [CommentController::class, 'index'])->name('main');
Route::get('/agenda', [MessageController::class, 'test'])->name('test');
Route::post('/', [CommentController::class, 'add'])->name('add_comment');
Route::get('/message/{id}', [MessageController::class, 'show'])->name('message_online');
