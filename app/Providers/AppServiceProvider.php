<?php

namespace App\Providers;

use App\Http\Macros\CreateUpdateOrDelete;
use App\Models\AccountType;
use App\Models\Featured;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use App\Models\QuickLink;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            // $this->app->register(TelescopeServiceProvider::class);
            // $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::composer('frontend.*', function ($view) {
        //     $settings = Cache::remember('settings', 60, function () {
        //         return Setting::first();
        //     });

        //     $menus = Cache::remember('menus', 60, function () {
        //         return Menu::with('childMenu')
        //             ->whereParentId(null)
        //             ->where('is_top_header', 0)
        //             ->where('is_active', 1)
        //             ->orderBy('display_order', 'asc')
        //             ->get();
        //     });

        //     $topmenus = Cache::remember('topmenus', 60, function () {
        //         return Menu::whereNull('parent_id')
        //             ->where('is_active', 1)
        //             ->where('is_top_header', 1)
        //             ->orderBy('display_order', 'asc')
        //             ->get();
        //     });


        //     $quickLinks = Cache::remember('quick_links', 60, function () {
        //         return QuickLink::where('is_active', 1)->get();
        //     });

        //     $featureds = Cache::remember('featureds', 60, function () {
        //         return Featured::with('product')->active()->get();
        //     });

        //     $accountTypes = Cache::remember('account_types', 60, function () {
        //         return AccountType::active()->displayOrder()->get();
        //     });

        //     $view->with([
        //         'settings' => $settings,
        //         'menus' => $menus,
        //         'topmenus' => $topmenus,
        //         'quickLinks' => $quickLinks,
        //         'featureds' => $featureds,
        //         'accountTypes' => $accountTypes,
        //     ]);
        // });
        // Schema::defaultStringLength(191);

        // HasMany::macro('createUpdateOrDelete', function (iterable $records) {
        //     /** @var HasMany */
        //     $hasMany = $this;

        //     return (new CreateUpdateOrDelete($hasMany, $records))();
        // });
    }
}
