<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\TransactionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('user',[UserController::class,'index'])->name('users.index');
Route::get('userRegistration',[UserController::class,'create'])->name('users.create');
Route::post('userStore',[UserController::class,'store'])->name('userStore');
Route::get('userView/{user}',[UserController::class,'show'])->name('userView');
Route::post('userUpdate',[UserController::class,'update'])->name('user.update');


Route::get('koleksi',[CollectionController::class,'index'])->name('collections.index');
Route::get('koleksiTambah',[CollectionController::class,'create'])->name('collections.create');
Route::post('koleksiStore',[CollectionController::class,'store'])->name('koleksiStore');
Route::get('koleksiView/{collection}',[CollectionController::class,'show'])->name('koleksiView');
Route::post('koleksiUpdate',[CollectionController::class,'update'])->name('collecion.update');

Route::get('transaksi',[TransactionController::class,'index'])->name('transaksi.index');
Route::get('transaksiTambah',[TransactionController::class,'create'])->name('transaksi.create');
Route::get('transaksiStore',[TransactionController::class,'store'])->name('transaksiStore');
Route::post('transaksiShow',[TransactionController::class,'show'])->name('transaksiShow');

Route::get('detailTransactionKembalikan/{id}',[DetailTransactionController::class,'detailTransactionKembalikan'])->name('dTransactionView');
Route::post('detailTransactionUpdate',[DetailTransactionController::class,'update'])->name('dTransaction.update');


Route::get('getAllTransactions', [UserController::class, 'getAllTransactions'])
        ->middleware(['auth','verified']);
Route::get('getAllDetailTransactions/{id}', [CollectionController::class, 'getAllDetailTransactions'])
        ->middleware(['auth','verified']);

Route::get('getAllUsers', [UserController::class, 'getAllUsers'])
        ->middleware(['auth','verified']);
Route::get('getAllCollections', [CollectionController::class, 'getAllCollections'])
        ->middleware(['auth','verified']);
Auth::routes();


require __DIR__.'/auth.php';
