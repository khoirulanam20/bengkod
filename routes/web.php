<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KRSController;

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
    return view('page_admin.dashboard.dashboard');
});

Route::get('/master-mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('/master-mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::delete('/master-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/master-mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/master-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

Route::get('/krs/{id}', [KRSController::class, 'index'])->name('krs.index');
Route::post('/krs', [KRSController::class, 'store'])->name('krs.store');
Route::delete('/krs/{id}', [KRSController::class, 'destroy'])->name('krs.destroy');
Route::get('/krs/pdf/{id}', [MahasiswaController::class, 'generatePDF'])->name('krs.pdf');
