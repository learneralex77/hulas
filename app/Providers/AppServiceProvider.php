<?php

namespace App\Providers;

use App\Http\Macros\CreateUpdateOrDelete;
use App\Models\AccountType;
use App\Models\Featured;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use App\Models\AboutUs;
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
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $settings = Cache::remember('settings', 0, function () {
                return Setting::first();
            });
            $aboutUs = Cache::remember('AboutUs', 0, function () {
                return AboutUs::first();
            });

            $menus = Cache::remember('menus', 0, function () {
                return Menu::with(['children' => function ($query) {
                    $query->where('is_published', 1)
                        ->orderBy('display_order', 'asc')
                        ->with(['children' => function ($subQuery) {
                            $subQuery->where('is_published', 1)
                                ->orderBy('display_order', 'asc');
                        }]);
                }])
                    ->whereNull('parent_id')
                    ->where('is_published', 1)
                    ->orderBy('display_order', 'asc')
                    ->get();
            });


           

                $footerQuickLinks = Cache::remember('footer_quick_links', 0, function () {
                $allQuickLinks = QuickLink::active()->orderByDisplayOrder()->get();
                return [
                    'quickLinks' => $allQuickLinks->take(5),
                    'extraLinks' => $allQuickLinks->count() > 5 ? $allQuickLinks->slice(5, 5) : collect(),
                    'moreLinks' => $allQuickLinks->count() > 10 ? $allQuickLinks->slice(10) : collect(),
                ];
            });


            $view->with([
                'settings' => $settings,
                'aboutUs'=> $aboutUs,
                'menus' => $menus,
                // 'quickLinks' => $quickLinks,
                'footerQuickLinks' => $footerQuickLinks,
            ]);
        });
        Schema::defaultStringLength(191);


    }
}
