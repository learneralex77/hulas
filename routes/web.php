<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\NewsEventCategoryController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AgentFormController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AgentDetailController;
use App\Http\Controllers\BecomeAnAgentController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// All protected admin routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Menu Management Routes
    Route::resource('menus', MenuController::class);

    // Page Management Routes
    Route::resource('pages', PageController::class);

    // Quick Link Management Routes
    Route::resource('quick-links', QuickLinkController::class);

    // Gallery Management Routes
    Route::resource('galleries', GalleryController::class);

    // Department Management Routes
    Route::resource('departments', DepartmentController::class);

    // Designation Management Routes
    Route::resource('designations', DesignationController::class);

    // Team Management Routes
    Route::resource('teams', TeamController::class);

    // Download Management Routes
    Route::resource('downloads', DownloadController::class);
    Route::get('downloads/{download}/download-file', [DownloadController::class, 'downloadFile'])->name('downloads.download-file');

    // News & Event Category Management Routes
    Route::resource('news-event-categories', NewsEventCategoryController::class);

    // Publication Management Routes
    Route::resource('publications', PublicationController::class);

    // Contact Us Management Routes
    Route::resource('contact-us', ContactUsController::class)->parameters([
        'contact-us' => 'contactUs'
    ]);

    // District Management Routes
    Route::resource('districts', DistrictController::class);

    // Zone Management Routes
    Route::resource('zones', ZoneController::class);

    // Agent Form Management Routes
    Route::resource('agent-forms', AgentFormController::class);

    // Branch Management Routes
    Route::resource('branches', BranchController::class);

    // Service Management Routes
    Route::resource('services', ServiceController::class);

    // Agent Details Management Routes
    Route::resource('agent-details', AgentDetailController::class);

    // Become an Agent Management Routes
    Route::resource('become-an-agent', BecomeAnAgentController::class);
    Route::delete('become-an-agent/{becomeAnAgent}/images/{index}', [BecomeAnAgentController::class, 'deleteImage'])->name('become-an-agent.delete-image');

    // About Us Management Routes
    Route::resource('about-us', AboutUsController::class)->parameters([
        'about-us' => 'aboutUs'
    ]);

    // Settings Management Routes
    Route::resource('settings', SettingController::class);
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
