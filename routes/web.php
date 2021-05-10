<?php

use App\Http\Controllers\AdminPost;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewPostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::group(['middleware'=>['userauth']],function(){
    Route::get('/send-mail',[MailController::class,'sendemail'])->name('send.mail');
    Route::get('/posts',[ViewPostsController::class,'index'])->name('view.post');
    Route::get('/posts/{post}',[ViewPostsController::class,'store'])->name('store.posts');
    Route::delete('/posts/{post}',[ViewPostsController::class,'destroy'])->name('destroy.posts');

    // Route::get('/mylog',function(){
    //     return view('mylog');
    // });
});
// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// End of email verification routes


Route::get('/get',[PostController::class,'index'])->name('get.post');
Route::post('/post',[PostController::class,'store'])->name('store.post');
Route::get('/edit/{id}',[PostController::class,'edit'])->name('edit.post');
Route::post('/update/{id}',[PostController::class,'update'])->name('update.post');
Route::get('/delete/{id}',[PostController::class,'destroy'])->name('delete.post');

Route::get('/admin/get',[AdminPost::class,'index'])->name('get.admin');
Route::post('/admin/post',[AdminPost::class,'store'])->name('store.admin');
Route::get('/admin/edit/{id}',[AdminPost::class,'edit'])->name('edit.admin');
Route::post('/admin/update/{id}',[AdminPost::class,'update'])->name('update.admin');
Route::get('/admin/delete/{id}',[AdminPost::class,'destroy'])->name('destroy.admin');

Route::get('/list-user',[AdminPost::class, 'ListUseredit'])->name('list.user');
Route::get('/admin/deleteuser/{id}',[AdminPost::class,'destroyuser'])->name('destroy.user');
