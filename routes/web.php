<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ControlPanel\PostControler;
use App\Http\Controllers\PostController;
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
//Route::get('/', function () {
//    return view('pages.posts.index');
//})->name('/');

Route::get('/', function () {
    return redirect()->route('posts.index');
})->name('/');


Route::get('posts/archive/{month}/{year}',[PostController::class,'archive'])->name('posts.archive');
Route::resource('posts',PostController::class);
Route::resource('categories',CategoryController::class)->only(['show','index']);

Route::middleware(['auth'])
    ->prefix('admin/')
    ->name('admin.')
    ->group(function (){
        Route::resource('posts',PostControler::class);
    });


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
