<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('login', [UserController::class, 'login'])->name('user-login');
Route::post('_login', [UserController::class, '_login']);
Route::post('logout', [UserController::class, 'logout'])->name('user-logout');

Route::prefix('todolist')
  ->controller(TodoController::class)
  ->group(function () {
    Route::get('/', 'index')->name('todolist');

    Route::post('/delete', 'delete')->name('todolist-delete');
    Route::post('/save', 'save')->name('todolist-save');
  });
