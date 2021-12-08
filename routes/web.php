<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\UserBookController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

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
    return view('userlayout');
});

Route::resource('/book', BookController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/vocabulary',VocabularyController::class);
Route::get('/user/book',[ UserBookController::class, 'index'])->name('user.book');
Route::get('/user/book/{book}',[ UserBookController::class, 'userBookDetail' ])->name('user.book.detail');
Route::post('/user/book/search/',[UserBookController::class, 'searchBook'])->name('user.book.search');
