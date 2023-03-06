<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\RefDinasController;
use App\Http\Controllers\Master\RefDinasPegawaiController;
use App\Http\Controllers\SuratController;
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
    return redirect('/login');
});


Route::group(['middleware'=>['auth','RolePermission'] ],function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix'=>'surat','as'=>'surat.' ],function () {
    Route::get('/surat', [SuratController::class, 'index'])->name('index');
        Route::get('/baru', [SuratController::class, 'baru'])->name('baru');
        Route::get('/semua', [SuratController::class, 'semua'])->name('semua');
    });
    Route::get('/master', [DashboardController::class, 'index'])->name('master');
    Route::group(['prefix'=>'master','as'=>'master.' ],function () {
        Route::resource('jabatan', App\Http\Controllers\Master\RefJabatanController::class); 
        Route::resource('jenis-dinas', App\Http\Controllers\Master\RefDinasJenisController::class); //create and edit 
        Route::resource('dinas', App\Http\Controllers\Master\RefDinasController::class);
        Route::get('/dinas/ttd/{idDinas}', [RefDinasController::class, 'TTD'])->name('dinas.ttd');
        // Route::post('/dinas/ttd/{idDinas}', [RefDinasController::class, 'akun'])->name('dinas.save');

        Route::resource('pegawai', App\Http\Controllers\Master\RefDinasPegawaiController::class);
        Route::get('/pegawai/akun/{idPegawai}', [RefDinasPegawaiController::class, 'akun'])->name('pegawai.akun');
        Route::post('/pegawai/akun/{idPegawai}', [RefDinasPegawaiController::class, 'createAkun'])->name('pegawai.createAkun');
        Route::resource('surat', App\Http\Controllers\Master\RefJenisSuratController::class);
    });
});
require __DIR__.'/auth.php';



