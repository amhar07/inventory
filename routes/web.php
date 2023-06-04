<?php

use App\Http\Controllers\barangmasukcontroller;
use App\Http\Controllers\barangkeluarcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\bukuindukcontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ApprovedController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\usercontroller;
use App\Models\barangmasuk;
use App\Models\barangkeluar;
use App\Models\bukuinduk;
use App\Models\barang;
use App\Models\user;
use App\Models\approved;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    $barangmasuk = barangmasuk::all()->count();
    $barangkeluar = barangkeluar::all()->count();
    return view('dashboard', [
        "title" => "Dashboard Inventory",
        "barangmasuk" => $barangmasuk,
        "barangkeluar" => $barangkeluar,
        "user" => User::where('id', auth()->user()->id)->get(),
    ]);
})->name('home')->middleware('auth');

Route::get('/login', [logincontroller::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [logincontroller::class, 'authenticate'])->middleware('guest');
Route::get('/flogout', [LoginController::class, 'logout']);

Route::get('barang-masuk', [barangmasukcontroller::class, 'index']);
Route::post('barang-masuk', [barangmasukcontroller::class, 'store']);
Route::post('barang-masuk', [barangmasukcontroller::class, 'edit']);
Route::put('barangmasuk', [barangmasukcontroller::class, 'update']);
Route::resource('barang-masuk', barangmasukcontroller::class);
Route::resource('barangmasuk', barangmasukcontroller::class);


Route::get('barang-keluar', [barangkeluarcontroller::class, 'index']);
Route::post('barang-keluar', [barangkeluarcontroller::class, 'store']);
Route::post('barang-keluar', [barangkeluarcontroller::class, 'edit']);
Route::put('barangkeluar', [barangkeluarcontroller::class, 'update']);
Route::resource('barang-keluar', barangkeluarcontroller::class);
Route::resource('barangkeluar', barangkeluarcontroller::class);

Route::get('databarang', [barangcontroller::class, 'index']);
Route::post('databarang', [barangcontroller::class, 'store']);

// hanya kepsek dan operator
Route::middleware('kepsek')->group(function () {
    Route::resource('/approved', ApprovedController::class)->except('show');
    Route::post('/approved/{pengajuan}/setuju', [ApprovedController::class, 'setuju']);
    Route::post('/approved/{pengajuan}/tolak', [ApprovedController::class, 'tolak']);
});
Route::middleware('sekretaris',)->group(function () {
    Route::resource('pengajuan', PengajuanController::class);
});
// Route::middleware('sekretaris', 'operator')->group(function () {
//     Route::resource('pengajuan', PengajuanController::class);
// });

Route::get('laporan', [pengajuancontroller::class, 'laporan']);
Route::post('laporan', [pengajuancontroller::class, 'edit']);
Route::put('laporan', [pengajuancontroller::class, 'update']);

Route::get('main', function () {
    return view('layouts.main', [
        "title" => ""
    ]);
});

Route::get('/informasi', function () {
    return view('informasi', [
        "title" => ""
    ]);
});

Route::get('registrasi', [RegistrasiController::class, 'index']);
Route::post('registrasi', [RegistrasiController::class, 'store']);

Route::post('profil', [RegistrasiController::class, 'update']);
Route::get('profil', [RegistrasiController::class, 'show']);

Route::get('/editbarangsampai', function () {
    return view('editbarangsampai', [
        "title" => ""
    ]);
});

Route::get('/pph', function () {
    return view('pph', [
        "title" => ""
    ]);
});

Route::get('/editbarangkeluar', function () {
    return view('editbarangkeluar', [
        "title" => ""
    ]);
});

Route::get('/editbarangmasuk', function () {
    return view('editbarangmasuk', [
        "title" => ""
    ]);
});


Route::get('/cekstok', [BarangController::class, 'cekstok']);
Route::post('/cekstok', [BarangController::class, 'cekStokUbah']);
Route::get('/stockOpname', [BarangController::class, 'stockOpname']);


Route::post('logout', [logincontroller::class, 'logout']);


Route::get('/user', [usercontroller::class, 'index'])->middleware('operator');