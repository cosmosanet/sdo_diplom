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

    Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
    Route::get('/fileDowload', [App\Http\Controllers\FileController::class, 'fileDowload'])->name('fileDowload');
    Route::get('/fileUpload', [App\Http\Controllers\FileController::class, 'fileUpload'])->name('fileUpload');