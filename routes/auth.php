<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AgentFormController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AgentDetailController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\BecomeAnAgentController;
use App\Http\Controllers\NewsEventCategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ForexRateController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\GrievanceController;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
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
    Route::get('news-event-categories-generate-slugs', [NewsEventCategoryController::class, 'generateSlugs'])->name('news-event-categories.generate-slugs');

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
    Route::get('agent-details/export', [AgentDetailController::class, 'export'])->name('agent-details.export');
    Route::post('agent-details/import', [AgentDetailController::class, 'import'])->name('agent-details.import');


    // Branch Management Routes
    Route::resource('branches', BranchController::class);

    // Service Management Routes
    Route::resource('services', ServiceController::class);

    // Agent Details Management Routes
    Route::resource('agent-details', AgentDetailController::class);

    // Become an Agent Management Routes
    Route::resource('become-an-agent', BecomeAnAgentController::class);
    Route::get('become-an-agent/{becomeAnAgent}/images/{index}', [BecomeAnAgentController::class, 'deleteImage'])->name('become-an-agent.delete-image');

    // About Us Management Routes
    Route::resource('about-us', AboutUsController::class)->parameters([
        'about-us' => 'aboutUs'
    ]);

    // Settings Management Routes
    Route::resource('settings', SettingController::class);


    Route::prefix('forex-rates')->name('forex-rate.')->group(function () {
        Route::get('/', [ForexRateController::class, 'index'])->name('index');
        Route::get('/create', [ForexRateController::class, 'create'])->name('create');
        Route::post('/', [ForexRateController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [ForexRateController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ForexRateController::class, 'update'])->name('update');

        Route::delete('/{forexRate}', [ForexRateController::class, 'destroy'])->name('destroy');
        Route::delete('/time-slot/{timeSlot}', [ForexRateController::class, 'destroyTimeSlot'])
            ->where('timeSlot', 'morning|afternoon')
            ->name('destroy-time-slot');

        Route::post('/add-row', [ForexRateController::class, 'addRateRow'])->name('add-row');
    });




    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Slider Management Routes
    Route::resource('sliders', SliderController::class);

    // Popup Management Routes
    Route::resource('popups', PopupController::class);

    // Partner Management Routes
    Route::resource('partners', PartnersController::class);

    // Grievance Management Routes
    Route::resource('grievances', GrievanceController::class);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
