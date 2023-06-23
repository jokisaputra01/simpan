<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpedeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelPostController;
use App\Http\Controllers\KategoriPostController;
use App\Http\Controllers\SubKategoriPostController;
use App\Http\Controllers\DokumenArtikelPostController;

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

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::resource('/dashboard/opd', OpedeController::class)->except('show');  

    Route::resource('/dashboard/kategori', KategoriPostController::class)->except('show');
    Route::resource('/dashboard/subkategori', SubKategoriPostController::class);
    Route::resource('/dashboard/artikel', ArtikelPostController::class);
    Route::resource('/dashboard/dokumenartikel', DokumenArtikelPostController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
