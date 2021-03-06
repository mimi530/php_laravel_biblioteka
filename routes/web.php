<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;

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
Route::group(['middleware'=>['auth']], function() {
    Route::get('books/search', [BookController::class, 'search'])->name('books.search');
    Route::resource('books', BookController::class)->only([
        'index', 'create', 'store'
    ])->names([
        'index' => 'books.index',
        'create' => 'books.create',
        'store' => 'books.store'
    ]);
    Route::resource('lendings', LendingController::class)->except([
        'update', 'edit'
    ])->names([
        'index' => 'lendings.index',
        'create' => 'lendings.create',
        'show' => 'lendings.show',
        'store' => 'lendings.store',
        'destroy' => 'lendings.destroy',
    ]);
});

