<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Ramsey\Collection\CollectionInterface;

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

Route::get('user',[UserController::class,'index'])->name('users.index');
Route::get('userRegistration',[UserController::class,'create'])->name('users.create');
Route::post('userStore',[UserController::class,'store'])->name('userStore');
Route::get('userView/{user}',[UserController::class,'show'])->name('userView');
Route::get('getAllCollections',[CollectionController::class,''])
        ->middleware(['auth','verified']);


Route::get('koleksi',[CollectionController::class,'index'])->name('collections.index');
Route::get('koleksiTambah',[CollectionController::class,'create'])->name('collections.create');
Route::post('koleksiStore',[CollectionController::class,'store'])->name('koleksiStore');
Route::get('koleksiView/{collection}',[CollectionController::class,'show'])->name('koleksiView');
Route::post('koleksiUpdate',[CollectionController::class,'update'])->name('koleksiUpdate');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('getAllUsers', [UserController::class, 'getAllUsers']);
Route::get('getAllCollections', [CollectionController::class, 'getAllCollections']);

Auth::routes();

require __DIR__.'/auth.php';
