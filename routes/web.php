<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RefugeeCampController as campCon;
use App\Http\Controllers\RefugeeController as refugeeCon;
use App\Http\Controllers\UserController as userCon;
use App\Http\Controllers\UnconfirmedController as unconfCon;


Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->middleware('guest')->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/maps', [App\Http\Controllers\HomeController::class, 'maps'])->name('maps');

Route::middleware('auth')->prefix('user')->name('u_')->group(function () {
    Route::get('/camps', [userCon::class, 'myCamps'])->name('myCamps');
    Route::get('/requests', [userCon::class, 'myRequests'])->name('myRequests');
    Route::get('/refugees', [userCon::class, 'myRefugees'])->name('myRefugees');

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
    Route::put('/acceptAll', [RefugeeCon::class, 'acceptAll'])->name('acceptAll')->middleware('auth');
});

Route::prefix('unconfirmed')->name('unconf_')->group(function () {
    Route::get('/create/{unconfirmedRequest}', [unconfCon::class, 'create'])->name('create');
});