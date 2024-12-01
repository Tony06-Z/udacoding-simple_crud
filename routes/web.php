<?php

use App\Http\Controllers\AdminDashbordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashbordController::class, 'index'])->name('admin.dashboard');
        Route::resource('user', App\Http\Controllers\UserController::class);
    });
});

Route::get('/admin', function (){
    return redirect()->route('admin.dashboard');
});


Route::middleware('auth', 'role:pengunjung')->group(function () {
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.dashboard');
});

Route::put('/pengunjung/{id}', [PengunjungController::class, 'update'])->name('pengunjung.update');