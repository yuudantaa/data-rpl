<?php

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

// routes/web.php

use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;



Route::get('/', [PageController::class, 'home']);
Route::get('/daftarKaryawan', [PageController::class, 'daftarKaryawan']);
Route::get('/daftarPerusahaan', [PageController::class, 'daftarPerusahaan'])->name('daftarPerusahaan');

Route::get('/karyawan', [PageController::class, 'daftarKaryawan'])->name('karyawan.index');
Route::get('/karyawan/create', [PageController::class, 'createKaryawan'])->name('karyawan.create');
Route::post('/karyawan', [PageController::class, 'storeKaryawan'])->name('karyawan.store');
Route::get('/karyawan/{karyawan}/edit', [PageController::class, 'editKaryawan'])->name('karyawan.edit');
Route::put('karyawan/{karyawan}', [PageController::class, 'updateKaryawan'])->name('karyawan.update');
Route::delete('/karyawan/{karyawan}', [PageController::class, 'destroyKaryawan'])->name('karyawan.destroy');

Route::get('/perusahaan', [PageController::class, 'daftarPerusahaan'])->name('perusahaan.index');
Route::get('/perusahaan/create', [PageController::class, 'createPerusahaan'])->name('perusahaan.create');
Route::post('/perusahaan', [PageController::class, 'storePerusahaan'])->name('perusahaan.store');
Route::get('/perusahaan/{perusahaan}/edit', [PageController::class, 'editPerusahaan'])->name('perusahaan.edit');
Route::put('/perusahaan/{perusahaan}', [PageController::class, 'updatePerusahaan'])->name('perusahaan.update');
Route::delete('/perusahaan/{perusahaan}', [PageController::class, 'destroyPerusahaan'])->name('perusahaan.destroy');

// Tambahkan route untuk Sumber Dana
Route::get('/sumberDana', [PageController::class, 'daftarSumberDana'])->name('sumberDana.index');
Route::get('/sumberDana/create', [PageController::class, 'createSumberDana'])->name('sumberDana.create');
Route::post('/sumberDana', [PageController::class, 'storeSumberDana'])->name('sumberDana.store');

Route::get('/sumberDana/edit/{sumberDana}', [PageController::class, 'updateSumberDana'])->name('sumberDana.edit');
Route::put('/sumberDana/{sumberDana}', [PageController::class, 'updateSumberDana'])->name('sumberDana.update');
Route::delete('/sumberDana/{sumberDana}', [PageController::class, 'destroySumberDana'])->name('sumberDana.destroy');

Route::get('/penggajian', [PageController::class, 'penggajian'])->name('penggajian.index');
Route::get('/penggajian/create', [PageController::class, 'createPenggajian'])->name('penggajian.create');
Route::post('/penggajian', [PageController::class, 'storePenggajian'])->name('penggajian.store');
Route::get('/penggajian/{id}/edit', [PageController::class, 'editPenggajian'])->name('penggajian.edit');
Route::put('/penggajian/{id}', [PageController::class, 'updatePenggajian'])->name('penggajian.update');
Route::delete('/penggajian/{id}', [PageController::class, 'destroyPenggajian'])->name('penggajian.destroy');

// Menampilkan halaman login (GET request)
Route::get('login', [PageController::class, 'login'])->name('login');

// Proses login (POST request)
Route::post('login', [PageController::class, 'processLogin'])->name('login.process');

// Halaman dashboard
Route::get('home', [PageController::class, 'home'])->name('home');



// Route::get('/login', [PageController::class, 'showLoginForm'])->name('login'); // Untuk menampilkan form login
// Route::post('/login', [PageController::class, 'login'])->name('login.submit'); // Untuk memproses login

// // Dashboard untuk Admin
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin-dashboard', [PageController::class, 'adminDashboard'])->name('admin.dashboard');
// });

// // Dashboard untuk Admin Perusahaan
// Route::middleware(['auth', 'role:admin_perusahaan'])->group(function () {
//     Route::get('/perusahaan-dashboard', [PageController::class, 'perusahaanDashboard'])->name('perusahaan.dashboard');
// });

// // Dashboard untuk Admin Bank
// Route::middleware(['auth', 'role:admin_bank'])->group(function () {
//     Route::get('/bank-dashboard', [PageController::class, 'bankDashboard'])->name('bank.dashboard');
// });



