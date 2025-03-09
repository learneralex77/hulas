<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::controller(SettingsController::class)
//         ->prefix('setting')
//         ->name('setting.')
//         ->group(function () {
//             Route::get('edit', 'edit')->name('edit');
//             Route::put('update', 'update')->name('update');
//         });
// });

require __DIR__ . '/auth.php';
