<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

//Masjid Controller
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\MasjidInController;
use App\Http\Controllers\MasjidOutController;

//Sosial Controller
use App\Http\Controllers\SosialController;
use App\Http\Controllers\SosialInController;
use App\Http\Controllers\SosialOutController;

//User Controller
use App\Http\Controllers\UserController;

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

Route::middleware('guest')->group(function() {
    //Login
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth']);

    //Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'regist']);
});

Route::middleware('auth')->group(function() {

    Route::middleware('excecutive')->group(function() {
        //Masjid
        //Masuk
        Route::get('/masjid/masuk', [MasjidInController::class, 'showMasuk'])->name('masjid-masuk');
        Route::get('/masjid/masuk/add', [MasjidInController::class, 'showAdd'])->name('masjid-masuk-add');
        Route::post('/masjid/masuk/store', [MasjidInController::class, 'store']);
        Route::get('/masjid/masuk/edit/{id}', [MasjidInController::class, 'showEdit'])->name('masjid-masuk-edit');
        Route::patch('/masjid/masuk/edit', [MasjidInController::class, 'edit']);
        Route::delete('/masjid/masuk/delete/{id}', [MasjidController::class, 'delete']);

        //Keluar
        Route::get('/masjid/keluar', [MasjidOutController::class, 'showKeluar'])->name('masjid-keluar');
        Route::get('/masjid/keluar/add', [MasjidOutController::class, 'showAdd'])->name('masjid-keluar-add');
        Route::post('/masjid/keluar/store', [MasjidOutController::class, 'store']);
        Route::get('/masjid/keluar/edit/{id}', [MasjidOutController::class, 'showEdit'])->name('masjid-keluar-edit');
        Route::patch('/masjid/keluar/edit', [MasjidOutController::class, 'edit']);
        Route::delete('/masjid/keluar/delete/{id}', [MasjidController::class, 'delete']);

        //Laporan
        Route::get('/masjid/laporan', [MasjidController::class, 'showLaporan'])->name('masjid-laporan');
        Route::get('/masjid/laporanfull', [MasjidController::class, 'showLaporanFull'])->name('masjid-laporanfull');
        Route::post('/masjid/laporansebagian', [MasjidController::class, 'showLaporanSebagian'])->name('masjid-laporansebagian');

        //Sosial
        //Masuk
        Route::get('/sosial/masuk', [SosialInController::class, 'showMasuk'])->name('sosial-masuk');
        Route::get('/sosial/masuk/add', [SosialInController::class, 'showAdd'])->name('sosial-masuk-add');
        Route::post('/sosial/masuk/store', [SosialInController::class, 'store']);
        Route::get('/sosial/masuk/edit/{id}', [SosialInController::class, 'showEdit'])->name('sosial-masuk-edit');
        Route::patch('/sosial/masuk/edit', [SosialInController::class, 'edit']);
        Route::delete('/sosial/masuk/delete/{id}', [SosialController::class, 'delete']);
        
        //Keluar
        Route::get('/sosial/keluar', [SosialOutController::class, 'showKeluar'])->name('sosial-keluar');
        Route::get('/sosial/keluar/add', [SosialOutController::class, 'showAdd'])->name('sosial-keluar-add');
        Route::post('/sosial/keluar/store', [SosialOutController::class, 'store']);
        Route::get('/sosial/keluar/edit/{id}', [SosialOutController::class, 'showEdit'])->name('sosial-keluar-edit');
        Route::patch('/sosial/keluar/edit', [SosialOutController::class, 'edit']);
        Route::delete('/sosial/keluar/delete/{id}', [SosialController::class, 'delete']);

        //Laporan
        Route::get('/sosial/laporan', [SosialController::class, 'showLaporan'])->name('sosial-laporan');
        Route::get('/sosial/laporanfull', [SosialController::class, 'showLaporanFull'])->name('sosial-laporanfull');
        Route::post('/sosial/laporansebagian', [SosialController::class, 'showLaporanSebagian'])->name('sosial-laporansebagian');
    });

    //dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    //Logout
    Route::post('/logout', [LoginController::class, 'logout']);
    //Mesjid
    //rekap
    Route::get('/masjid/rekap', [MasjidController::class, 'showRekap'])->name('masjid-rekap');
    //Sosial
    //rekap
    Route::get('/sosial/rekap', [SosialController::class, 'showRekap'])->name('sosial-rekap');

    Route::middleware('admin')->group(function(){
        //Users
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/add', [UserController::class, 'showAdd'])->name('users-add');
        Route::post('/users/store', [UserController::class, 'store']);
        Route::get('/users/edit/{id}', [UserController::class, 'showEdit'])->name('users-edit');
        Route::patch('/users/edit', [UserController::class, 'edit']);
        Route::delete('/users/delete/{id}', [userController::class, 'delete']);
    });

});






//Logout

//Admin
    

    
    
    
   
    