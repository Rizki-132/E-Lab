<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::middleware(['auth'])->get('/redirect', function () {
    $role = Auth::user()->role;

    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'siswa') {
        return redirect()->route('mahasiswa.form');
    } else {
        abort(403, 'Akses ditolak.');
    }
})->name('redirect');


Route::middleware(['auth', 'is_admin'])->group(function () {
   Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/print', [AdminController::class, 'print'])->name('admin.print');
     Route::get('/admin/laporan/{id}', [AdminController::class, 'show'])->name('admin.laporan.show');
     Route::get('/admin/laporan/data', [AdminController::class, 'dataLaporan'])->name('admin.laporan.data');
     Route::delete('/admin/{id}', [AdminController::class, 'destroyLaporan'])->name('admin.laporan.delete');

    //  user
       Route::get('/usertable', [AdminController::class, 'indexUser'])->name('admin.tabelUser');
       Route::get('/admin/create', [AdminController::class, 'createUser'])->name('admin.createUser');
       Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.storeUser');
       Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.destroyUser');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/form', [LaporanController::class, 'create'])->name('mahasiswa.form');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/terimakasih', function () {
    return view('mahasiswa.terimakasih');
    })->name('mahasiswa.terimakasih');
});


Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
