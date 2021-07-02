<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        if(Schema::hasTable('menus')){
            config(['coreui.menu' => array_remove_empty(\App\Models\Menu::with('submenu')->whereNull('parent_id')->get()->toArray())]);
        }

    }
}
