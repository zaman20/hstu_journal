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
Route::get('/author-dashboard',[AppController::class,'authorDashboard'])->name('dashboard');
Route::get('/author-submit',[AppController::class,'authorSubmit'])->name('author1');
Route::post('/paper-submit',[AppController::class,'paperSubmit']);
Route::get('/author-pending-paper',[AppController::class,'authorPending'])->name('author4');
Route::get('/paper-view/{id}',[AppController::class,'paperView']);
Route::get('/author-register',[AppController::class,'authorRegisterPage']);
Route::post('/add-author',[AppController::class,'addAuthor']);
Route::post('/auth-login',[AppController::class,'loginAuth']);
Route::get('/logout',[AppController::class,'logout']);
Route::get('/processed-paper/user={user}',[AppController::class,'processedPaper']);

Route::get('/editor-dashboard',[AppController::class,'editorDashboard'])->name('editor1');
Route::get('/editor-pending-paper',[AppController::class,'editorPendingPaper'])->name('editor2');
Route::post('/editor-comment',[AppController::class,'editorComment']);
Route::post('/editor-to-revision',[AppController::class,'editortoRevision']);
Route::get('/incomplete-submission/user={user}',[AppController::class,'incompleteSubmission'])->name('editor4');

Route::get('/author-incomplete-submission',[AppController::class,'authorIncompleteSubmission']);
Route::post('/add-reviewer',[AppController::class,'addReviewer']);
Route::get('/reviewers',[AppController::class,'reviewers'])->name('editor3');
Route::post('/dlt-reviewer',[AppController::class,'dltReviewer']);
Route::post('/dlt-paper',[AppController::class,'dltPaper']);

