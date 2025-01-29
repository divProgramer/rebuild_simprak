<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserConstroller;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JurnalController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'regis'])->name('regis');
Route::post('/registrasi', [AuthController::class, 'store'])->name('store.regis');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    // user
    Route::controller(UserConstroller::class)->middleware('role:admin')->group(function () {
        // siswa
        Route::prefix('siswa')->group(function () {
            Route::get('/', 'siswa')->name('data.siswa');
            Route::get('/update/{id}', 'edit')->name('edit.siswa');
            Route::post('/update/{id}', 'update')->name('update.siswa');
        });

        // fasilitator
        Route::prefix('fasilitator')->group(function () {
            Route::get('/', 'fasilitator')->name('data.fasilitator');
            Route::get('/create', 'fasilitatorCreate')->name('create.fasilitator');
            Route::post('/store', 'fasilitatorStore')->name('store.fasilitator');
        });

        // guru
        Route::prefix('guru')->group(function(){
            Route::get('/', 'guru')->name('data.guru');
            Route::get('/create', 'guruCreate')->name('create.guru');
            Route::post('/store', 'guruStore')->name('store.guru');
        });
    });

    // sekolah
    Route::controller(SekolahController::class)->middleware('role:admin')->prefix('sekolah')->group(function(){
        Route::get('/', 'index')->name('data.sekolah');
        Route::get('/create', 'create')->name('create.sekolah');
        Route::post('/store', 'store')->name('store.sekolah');
    });

    // jurusan
    Route::controller(JurusanController::class)->middleware('role:admin')->prefix('jurusan')->group(function(){
        Route::get('/', 'index')->name('data.jurusan');
        Route::get('/create', 'create')->name('create.jurusan');
        Route::post('/store', 'store')->name('store.jurusan');
    });

    // kelompok
    Route::controller(KelompokController::class)->middleware('role:admin')->prefix('kelompok')->group(function(){
        Route::get('/', 'index')->name('data.kelompok');
        Route::get('/create', 'create')->name('create.kelompok');
        Route::post('/store', 'store')->name('store.kelompok');
    });

    // instansi
    Route::controller(InstansiController::class)->middleware('role:admin')->prefix('instansi')->group(function(){
        Route::get('/', 'index')->name('data.instansi');
        Route::get('/create', 'create')->name('create.instansi');
        Route::post('/store', 'store')->name('store.instansi');
    });

    Route::controller(JurnalController::class)->middleware('auth')->prefix('jurnal')->group(function(){
        Route::get('/', 'index')->name('data.jurnal');
        Route::get('/create', 'create')->name('create.jurnal');
        Route::post('/store', 'store')->name('store.jurnal');
    });
});

