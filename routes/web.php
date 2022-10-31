<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RefugeeCampController as campCon;
use App\Http\Controllers\UserController as userCon;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('u_')->group(function () {
    Route::get('/', [userCon::class, 'index'])->name('index');
});
Route::prefix('camp')->name('c_')->group(function () {
    Route::get('/', [campCon::class, 'index'])->name('index');
    Route::get('/create', [campCon::class, 'create'])->name('create');
    Route::post('/create', [campCon::class, 'store'])->name('store');
    Route::get('/show/{camp}', [campCon::class, 'show'])->name('show');
    Route::delete('/delete/{camp}', [campCon::class, 'destroy'])->name('delete');
    Route::get('/edit/{camp}', [campCon::class, 'edit'])->name('edit');
    Route::put('/edit/{camp}', [campCon::class, 'update'])->name('update');
});