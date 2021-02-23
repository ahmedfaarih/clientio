<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\FileUpload;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('gouser');

Route::get('/home/admin', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('adminHome')->middleware("admin");

/*Route::get('/home/manageuser', [App\Http\Controllers\UserController::class, 'index'])->name('UserManager')->middleware("admin");

Route::get('/home/manageuser/create', [App\Http\Controllers\UserController::class, 'create'])->name('UserCreator')->middleware("admin");*/

Route::resource('users', UserController::class)->middleware("admin");
