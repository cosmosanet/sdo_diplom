<?php

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

// Route::get('/', function () {
//     return view('welcome');});

    Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/fileDowload', [App\Http\Controllers\FileController::class, 'fileDowload'])->name('fileDowload')->middleware('auth');
    Route::get('/fileUpload', [App\Http\Controllers\FileController::class, 'fileUpload'])->name('fileUpload')->middleware('auth');

    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginpage'])->name('loginpage');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');