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
Route::get('/processed-paper/user={user}',[AppController::class,'processedPaper'])->name('author5');
Route::get('/submission-for-approval',[AppController::class,'submissionApproval'])->name('editor6');

Route::get('/editor-dashboard',[AppController::class,'editorDashboard'])->name('editor1');
Route::get('/editor-pending-paper',[AppController::class,'editorPendingPaper'])->name('editor2');
Route::post('/editor-comment',[AppController::class,'editorComment']);
Route::post('/reviewer-comment',[AppController::class,'reviewerComment']);
Route::get('/submission-after-review/{reviewer}',[AppController::class,'submissionAfterReview'])->name('r2');
Route::post('/editor-to-revision',[AppController::class,'editortoRevision']);
Route::post('/editor-to-reviewer',[AppController::class,'editortoReviewer']);
Route::get('/submission-in-revission/user={user}',[AppController::class,'revissionSubmission'])->name('editor4');
Route::get('/incomplete-submission/user={user}',[AppController::class,'incompleteSubmission'])->name('editor5');
Route::get('/declined-paper/user={user}',[AppController::class,'declinedPaper'])->name('r3');
Route::get('/incomplete-paper-view/{id}',[AppController::class,'incompletePaperView']);
Route::get('/reviewer-dashboard',[AppController::class,'reviewerDashboard'])->name('r1');

// Route::get('/author-need-revision',[AppController::class,'authorRevision']);
Route::post('/add-reviewer',[AppController::class,'addReviewer']);
Route::get('/reviewers',[AppController::class,'reviewers'])->name('editor3');
Route::post('/dlt-reviewer',[AppController::class,'dltReviewer']);
Route::post('/dlt-paper',[AppController::class,'dltPaper']);
Route::post('/inc1',[AppController::class,'inc1']);
Route::post('/inc2',[AppController::class,'inc2']);
Route::post('/inc3',[AppController::class,'inc3']);
Route::post('/inc4',[AppController::class,'inc4']);
Route::post('/inc5',[AppController::class,'inc5']);
Route::post('/inc6',[AppController::class,'inc6']);
Route::post('/dlt-inc',[AppController::class,'dltInc']);
Route::post('/editor-approve',[AppController::class,'editorApprove']);
Route::post('/declined',[AppController::class,'makeDeclined']);


