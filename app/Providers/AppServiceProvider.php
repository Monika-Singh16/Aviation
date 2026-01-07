<?php

namespace App\Providers;
// use App\Models\Facility;
// use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    // public function boot()
    // {
    //     View::composer('*', function ($view) {
    //         $facilities = Facility::where('is_active', 1)->get();
    //         $view->with('facilities', $facilities);
    //     });
    // }
}
