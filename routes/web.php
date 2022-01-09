<?php

use App\Http\Controllers\DaganganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UmkmController;
use App\Models\Umkm;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth', 'cekrole:admin,user'])->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // Route UMKM
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm');
    Route::get('/tambahumkm', [UmkmController::class, 'create'])->name('tambahumkm');
    Route::post('/tambahkanumkm', [UmkmController::class, 'store'])->name('tambahkanumkm');
    Route::get('/editumkm/{id}', [UmkmController::class, 'edit'])->name('editumkm');
    Route::post('/editkanumkm/{id}', [UmkmController::class, 'update'])->name('editkanumkm');
    Route::get('/lihatumkm/{id}', [UmkmController::class, 'show'])->name('lihatumkm');
    Route::get('/hapusumkm/{id}', [UmkmController::class, 'destroy'])->name('hapusumkm');

    // Route Daganganan
    Route::get('/dagangan', [DaganganController::class, 'index'])->name('dagangan');
    Route::get('/tambahdagangan', [DaganganController::class, 'create'])->name('tambahdagangan');
    Route::post('/tambahkandagangan', [DaganganController::class, 'store'])->name('tambahkandagangan');
    Route::get('/editdagangan/{id}', [DaganganController::class, 'edit'])->name('editdagangan');
    Route::post('/editkandagangan/{id}', [DaganganController::class, 'update'])->name('editkandagangan');
    Route::get('/hapusdagangan/{id}', [DaganganController::class, 'destroy'])->name('hapusdagangan');
    Route::get('/daftardagangan/{id}', [DaganganController::class, 'daftar'])->name('daftardagangan');

    // Route Pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/tambahpelanggan', [PelangganController::class, 'create'])->name('tambahpelanggan');
    Route::post('/tambahkanpelanggan', [PelangganController::class, 'store'])->name('tambahkanpelanggan');
    Route::get('/editpelanggan/{id}', [PelangganController::class, 'edit'])->name('editpelanggan');
    Route::post('/editkanpelanggan/{id}', [PelangganController::class, 'update'])->name('editkanpelanggan');
    Route::get('/hapuspelanggan/{id}', [PelangganController::class, 'destroy'])->name('hapuspelanggan');
});
