<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BecomeAnAgentController;
use App\Http\Controllers\DownloadController;

Route::get('/', function () {
    return redirect(route('homepage'));
});

Route::get('homepage', [FrontendController::class, 'homepage'])->name('homepage');

Route::get('about-hulas-remittance', [FrontendController::class, 'aboutHulasRemittance'])->name('aboutHulasRemittance');
Route::get('about-western-union', [FrontendController::class, 'aboutWesternUnion'])->name('aboutWesternUnion');
Route::get('mission-and-vision', [FrontendController::class, 'missionAndVision'])->name('missionAndVision');
Route::get('message-from-director', [FrontendController::class, 'messageFromDirector'])->name('messageFromDirector');
Route::get('organizational-structure', [FrontendController::class, 'organizationalStructure'])->name('organizationalStructure');


Route::get('services', [FrontendController::class, 'services'])->name('services');
Route::get('services/{slug?}', [FrontendController::class, 'serviceDetail'])->name('serviceDetail');

Route::get('become-an-agent', [FrontendController::class, 'becomeAnAgent'])->name('becomeAnAgent');
Route::post('become-an-agent', [BecomeAnAgentController::class, 'store'])->name('storeAgentRequest');

Route::resource('admin/become-an-agent', BecomeAnAgentController::class);

Route::get('find-an-agent', [FrontendController::class, 'findAnAgent'])->name('findAnAgent');

Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('contactUs');
Route::post('contact-us', [App\Http\Controllers\ContactUsController::class, 'store'])->name('storeContactInquiry');
Route::post('backend/contact-us/{contactUs}/toggle-status', [App\Http\Controllers\ContactUsController::class, 'toggleContactStatus'])->name('contact-us.toggle-status');

Route::get('downloads', [FrontendController::class, 'downloads'])->name('downloads');
Route::get('/downloads/file/{download}', [FrontendController::class, 'downloadFile'])->name('frontend.downloads.download');

Route::get('news-and-events', [FrontendController::class, 'newsAndEvents'])->name('newsAndEvents');
Route::get('news-and-events-detail-page/{slug?}', [FrontendController::class, 'newsAndEventsDetailPage'])->name('newsAndEventsDetailPage');

Route::get('gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('gallery-detail/{slug?}', [FrontendController::class, 'galleryDetail'])->name('galleryDetail');

Route::get('grievances', [FrontendController::class, 'grievances'])->name('grievances');
Route::post('grievances', [App\Http\Controllers\GrievanceController::class, 'store'])->name('grievances.store');

Route::get('privacy-and-policy', [FrontendController::class, 'privacyAndPolicy'])->name('privacyAndPolicy');
Route::get('terms-and-conditions', [FrontendController::class, 'termsAndConditions'])->name('termsAndConditions');

Route::get('quick-links', [FrontendController::class, 'quickLinks'])->name('quickLinks');

Route::get('sitemap', [FrontendController::class, 'sitemap'])->name('sitemap');

Route::get('forex-rate', [FrontendController::class, 'forexRate'])->name('forexRate');

Route::get('header', [FrontendController::class, 'header'])->name('header');

// Admin routes moved to auth.php
require __DIR__ . '/auth.php';

// Routes for services














