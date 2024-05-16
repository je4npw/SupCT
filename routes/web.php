<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Globals\ConfigController;
use App\Livewire\Usuario;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Acolhidos;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/acolhidos', Acolhidos::class)->middleware(['auth', 'verified'])->name('acolhidos');
Route::get('/usuario', Usuario::class)->middleware(['auth', 'verified'])->name('usuario');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/config', [ConfigController::class, 'index'])->name('configuration.index');

require __DIR__.'/auth.php';
