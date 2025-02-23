<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/test',[Controller::class, 'test'])->middleware('auth')->name('test');

Route::middleware('auth')->group(function () {
    Route::get('/absen',[KaryawanController::class, 'index'])->name('absen');
    Route::get('/absen/create',[KaryawanController::class, 'create']);
});