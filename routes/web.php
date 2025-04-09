<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalDokterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;


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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/utama', [UserController::class, 'index'])->name('dashboard.utama');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

Route::resource('jadwal', JadwalDokterController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/antrian', [AntrianController::class, 'index'])->name('dashboard.antrian.create');
    Route::get('/antrian/create', [AntrianController::class, 'create'])->name('dashboard.antrian.create');
    Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
    Route::get('/profil', [UserController::class, 'profile'])->name('dashboard.profil');
    Route::get('/profil-edit', [UserController::class, 'edit'])->name('dashboard.edit-profil');
    Route::put('/profil/{id}', [UserController::class, 'update'])->name('dashboard.update-profil');
    Route::get('/antrian-pdf/{id}', [AntrianController::class, 'cetakAntrian'])->name('antrian.pdf');
    Route::get('/hapus-antrian', [AntrianController::class, 'hapusAntrianLama']);

});

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', function() {
        return view('admin.index');
    });
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/lihatuser', [AdminController::class, 'profile'])->name('admin.menu.show-user');
    Route::get('/edit-user/{id}', [AdminController::class, 'edit'])->name('admin.menu.edit-user');
    Route::put('/edit-user/{id}', [AdminController::class, 'update'])->name('admin.menu.update-user');
    Route::get('/deleteuser', [AdminController::class, 'destroy'])->name('admin.menu.delete');
    Route::get('/lihatjadwal', [AdminController::class, 'jadwal'])->name('admin.menu.jadwal-show');
    Route::get('/tambahjadwal', [JadwalDokterController::class, 'create'])->name('admin.menu.jadwal-create');
    Route::post('/tambahjadwal', [JadwalDokterController::class, 'store'])->name('admin.menu.jadwal-store');
    Route::get('/edit-jadwal/{id}/edit', [JadwalDokterController::class, 'editjadwal'])->name('admin.menu.jadwal-edit');
    Route::put('/edit-jadwal/{id}', [JadwalDokterController::class, 'updatejadwal'])->name('admin.menu.jadwal-update');
    Route::delete('/jadwal/{id}', [JadwalDokterController::class, 'destroy'])->name('admin.menu.jadwal-destroy');
    Route::get('/lihatantrian', [AdminController::class, 'lihatantrian'])->name('admin.menu.antrian-show');
});




