<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


Route::get('/', function () {
    return redirect(route('homepage'));
});

Route::get('homepage', [FrontendController::class, 'homepage'])->name('homepage');
Route::get('about-us', [FrontendController::class, 'aboutUs'])->name('aboutUs');
Route::get('become-an-agent', [FrontendController::class, 'becomeAnAgent'])->name('becomeAnAgent');
Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('contactUs');
Route::get('find-an-agent', [FrontendController::class, 'findAnAgent'])->name('findAnAgent');
Route::get('gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('grievances', [FrontendController::class, 'grievances'])->name('grievances');
Route::get('message-from-director', [FrontendController::class, 'messageFromDirector'])->name('messageFromDirector');
Route::get('mission-and-vision', [FrontendController::class, 'missionAndVision'])->name('missionAndVision');
Route::get('news-and-events', [FrontendController::class, 'newsAndEvents'])->name('newsAndEvents');
Route::get('news-and-events-detail-page', [FrontendController::class, 'newsAndEventsDetailPage'])->name('newsAndEventsDetailPage');
Route::get('organizational-structure', [FrontendController::class, 'organizationalStructure'])->name('organizationalStructure');
Route::get('privacy-and-policy', [FrontendController::class, 'privacyAndPolicy'])->name('privacyAndPolicy');
Route::get('quick-links', [FrontendController::class, 'quickLinks'])->name('quickLinks');
Route::get('sitemap', [FrontendController::class, 'sitemap'])->name('sitemap');
Route::get('terms-and-conditions', [FrontendController::class, 'termsAndConditions'])->name('termsAndConditions');


// Route::fallback(function () {
//     return view('frontend.layouts.errors.404');
// });


require __DIR__ . '/auth.php';
