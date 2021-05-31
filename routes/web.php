<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\ProjectController;
use  App\Http\Controllers\ProjectUpdatesController;
use  App\Http\Controllers\LegalBitsController;
use  App\Http\Controllers\FileUpload;
use  App\Http\Controllers\BotsController;
use  App\Http\Controllers\PublicationsController;
use  App\Http\Controllers\DocumentRequestController;

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

Route::resource('users', UserController::class, ['except'=> ['show']])->middleware("admin");

Route::resource('legalBits', LegalBitsController::class)->names('legalBits')->middleware("admin");

Route::resource('projects', ProjectController::class)->middleware("admin");

Route::resource('publications', PublicationsController::class)->middleware("admin");

Route::resource('updates',ProjectUpdatesController::class,['except'=> ['show']])->middleware("admin");

Route::resource('bots', BotsController::class)->names('Bots')->middleware("admin");;

/*Route::get("clientUpdate/id", [ProjectUpdatesController::class, 'show'])->name('clientUpdate')->middleware('gouser');*/

/*takes a client id to projects controller show method to show his project detail*/
Route::get('clientUpdate/{id}',[ProjectUpdatesController::class, 'show'])->name('clientUpdate');
Route::get('clientDetail/{id}',[UserController::class, 'show'])->name('clientDetail');

Route::get('/documentrequest', [DocumentRequestController::class, 'create'])->middleware("admin");

Route::post('/documentrequest', [DocumentRequestController::class, 'store'])->name('fileUpload');

/*this method will take a client ID and Display the requests for that client*/
Route::get('/clientRequest/{id}', [DocumentRequestController::class, 'showClientRequests'])->name('clientRequest');

Route::POST('/updateDocumentRequest/{id}', [DocumentRequestController::class, 'updateDocumentRequest'])->name('updateDocumentRequest');
