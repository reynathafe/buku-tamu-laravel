<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes/web.php
Route::get('/', function () {
    return redirect()->route('guests.create');
});

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');


Route::get('/guests', [GuestController::class, 'index'])->name('guests');
Route::get('guests', [GuestController::class, 'index'])->name('guests.index');
Route::get('guests/create', [GuestController::class, 'create'])->name('guests.create');
Route::post('guests', [GuestController::class, 'store'])->name('guests.store');
Route::get('guests/{id}/edit', [GuestController::class, 'edit'])->name('guests.edit');
Route::delete('guests/{id}', [GuestController::class, 'destroy'])->name('guests.destroy');
Route::put('guests/{id}', [GuestController::class, 'update'])->name('guests.update');


Route::get('/guests/form', [GuestController::class, 'showForm'])->name('guests.form');
Route::post('/guests/store', [GuestController::class, 'store'])->name('guests.store');
Route::get('/welcome', [GuestController::class, 'showWelcomePage'])->name('guests.welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
