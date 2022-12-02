<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RefugeeCampController as campCon;
use App\Http\Controllers\RefugeeController as refugeeCon;
use App\Http\Controllers\UserController as userCon;
use App\Http\Controllers\OutsideRequestController as reqCon;


Route::view('/', 'welcome')->middleware('guest')->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('user')->name('u_')->group(function () {
    Route::get('/', [userCon::class, 'myCamps'])->name('myCamps');
    Route::get('/unconfirmedRequests', [userCon::class, 'unconfirmedRequests'])->name('unconfirmedRequests');

});
Route::prefix('camp')->name('c_')->group(function () {
    Route::get('/', [campCon::class, 'index'])->name('index');
    Route::get('/create', [campCon::class, 'create'])->name('create')->middleware('auth');
    Route::post('/create', [campCon::class, 'store'])->name('store')->middleware('auth');
    Route::get('/show/{camp}', [campCon::class, 'show'])->name('show');
    Route::delete('/delete/{camp}', [campCon::class, 'destroy'])->name('delete')->middleware('auth');
    Route::get('/edit/{camp}', [campCon::class, 'edit'])->name('edit')->middleware('auth');
    Route::put('/edit/{camp}', [campCon::class, 'update'])->name('update')->middleware('auth');
});

Route::prefix('refugee')->name('r_')->group(function () {
    Route::get('/', [refugeeCon::class, 'index'])->name('index');
    Route::get('/create/{camp}', [refugeeCon::class, 'create'])->name('create');
    Route::post('/create', [refugeeCon::class, 'store'])->name('store');
    Route::get('/show/{refugee}', [refugeeCon::class, 'show'])->name('show');
    Route::delete('/delete/{refugee}', [refugeeCon::class, 'destroy'])->name('delete')->middleware('auth');
    Route::get('/edit/{refugee}', [refugeeCon::class, 'edit'])->name('edit')->middleware('auth');
    Route::put('/edit/{refugee}', [refugeeCon::class, 'update'])->name('update')->middleware('auth');
});

Route::prefix('request')->name('req_')->group(function () {
    Route::get('/', [reqCon::class, 'index'])->name('index');
    Route::get('/create/{camp}', [reqCon::class, 'create'])->name('create');
    Route::post('/create', [reqCon::class, 'store'])->name('store');
    Route::post('/storeRefugeeAndDeleteRequest/{outsideRequest}', [reqCon::class, 'storeRefugeeAndDeleteRequest'])->name('storeRefugeeAndDeleteRequest')->middleware('auth');
    Route::get('/show/{outsideRequest}', [reqCon::class, 'show'])->name('show')->middleware('auth');
    Route::delete('/delete/{outsideRequest}', [reqCon::class, 'destroy'])->name('delete')->middleware('auth');
});