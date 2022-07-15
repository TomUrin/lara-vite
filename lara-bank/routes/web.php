<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController as A;

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

//Accounts
Route::get('/accounts', [A::class, 'index'])->name('accounts-index')->middleware('rp:admin');
Route::get('/accounts/create', [A::class, 'create'])->name('accounts-create')->middleware('rp:admin');
Route::post('/accounts', [A::class, 'store'])->name('accounts-store')->middleware('rp:admin');
Route::get('/accounts/edit/{account}', [A::class, 'edit'])->name('accounts-edit')->middleware('rp:admin');
Route::put('/accounts/{account}', [A::class, 'update'])->name('accounts-update')->middleware('rp:admin');
Route::delete('/accounts/{account}', [A::class, 'destroy'])->name('accounts-delete')->middleware('rp:admin');
Route::get('/accounts/show/{id}', [A::class, 'show'])->name('accounts-show')->middleware('rp:admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
