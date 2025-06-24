<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\post;
use Illuminate\Support\Facades\View;


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
        Paginator::useBootstrap();
        $catAll = Category::has('posts')->get();
        $navItem = $catAll->splice(0,3);
        $restCategory = $catAll->splice(0);
        View::share('navItem', $navItem);
        View::share('restCategory', $restCategory);
    }
}
