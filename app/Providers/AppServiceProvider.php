<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\models\Admin\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     View::composer("theme.lte.aside", function ($view){
         $menus= Menu::getMenu(true);
         $view->with('menusComposer', $menus);
     });
     View::share('theme', 'lte');
    }
}
