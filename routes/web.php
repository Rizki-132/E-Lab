<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LaporanController::class, 'create']);
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

Auth::routes();
Auth::routes();

Route::middleware(['auth', 'is_admin'])->group(function () {
   Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/print', [AdminController::class, 'print'])->name('admin.print');

     Route::get('/admin/laporan/data', [AdminController::class, 'dataLaporan'])->name('admin.laporan.data');
     Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
