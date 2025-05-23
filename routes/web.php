<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EsdevenimentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Esdeveniment;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', [HomeController::class, '__invoke']);

Route::middleware('auth')->group(function () {
    Route::get('/index', [EsdevenimentController::class, 'index'])->name('esdeveniments.index');
    Route::get('/evento/{id}', [EsdevenimentController::class, 'show'])->name('esdeveniments.show');
    Route::get('/evento/reservar/{id}', [EsdevenimentController::class, 'reservar'])->name('esdeveniments.reserva');
    Route::get('/evento/cancelar/{id}', [EsdevenimentController::class, 'cancelarReserva'])->name('esdeveniments.cancelar');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/index/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/evento/crear/admin', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/categoria/crear', [AdminController::class, 'createCategoria'])->name('admin.createCategoria');
    Route::get('/evento/{id}/admin', [AdminController::class, 'show'])->name('admin.show');
    Route::post('/evento/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::post('/categoria/admin/store', [AdminController::class, 'storeCategoria'])->name('admin.storeCategoria');
    Route::get('/evento/editar/{id}/admin', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/evento/update/{id}/admin', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/evento/eliminar/{id}/admin', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/categoria/eliminar/{id}', [AdminController::class, 'destroyCategoria'])->name('admin.destroyCategoria');
});

require __DIR__.'/auth.php';
