<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
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

Route::get('/', function () {
    return view('login');
});
Route::get('/author-dashboard',[AppController::class,'authorDashboard']);
Route::get('/author-submit',[AppController::class,'authorSubmit']);
Route::post('/paper-submit',[AppController::class,'paperSubmit']);
Route::get('/author-pending-paper',[AppController::class,'authorPending']);
Route::get('/author-paper-view/{id}',[AppController::class,'authorPaperView']);
Route::get('/author-register',[AppController::class,'authorRegisterPage']);
Route::post('/add-author',[AppController::class,'addAuthor']);

