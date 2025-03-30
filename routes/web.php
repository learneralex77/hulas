<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect(route('homepage'));
});



Route::get('homepage', [FrontendController::class, 'homepage'])->name('homepage');

Route::fallback(function () {
    return view('frontend.layouts.errors.404');
});


require __DIR__ . '/auth.php';
