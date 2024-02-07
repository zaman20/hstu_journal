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
Route::get('/paper-view/{id}',[AppController::class,'paperView']);
Route::get('/author-register',[AppController::class,'authorRegisterPage']);
Route::post('/add-author',[AppController::class,'addAuthor']);
Route::post('/auth-login',[AppController::class,'loginAuth']);
Route::get('/logout',[AppController::class,'logout']);
Route::get('/editor-dashboard',[AppController::class,'editorDashboard']);
Route::get('/editor-pending-paper',[AppController::class,'editorPendingPaper']);
Route::post('/editor-comment',[AppController::class,'editorComment']);
Route::post('/editor-to-revision',[AppController::class,'editortoRevision']);
Route::get('/incomplete-submission',[AppController::class,'incompleteSubmission']);

