<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Globals\ConfigController;
use App\Http\Controllers\MenuItemController as Link;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Menuitem
    Route::get('/menuitem', [Link::class, 'listItems'])->name('menuitem.listItems');
});

Route::get('/config', [ConfigController::class, 'index'])->name('configuration.index');

require __DIR__.'/auth.php';
