<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\cuti;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        View::share('notif', cuti::where('status',false)->count());
        Blade::component('components.card', 'card');
        Blade::component('components.alert', 'alert');
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');
    }
}
