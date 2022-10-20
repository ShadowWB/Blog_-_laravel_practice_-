<?php

namespace App\Providers;

use App\Models\{Category, Post};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        $archive=Post::selectRaw('year(created_at) as post_year,month(created_at) as post_month_number,monthname(created_at) as post_month_name,count(*) as qty' )
            ->whereRaw('year(created_at) = 2022')
            ->groupByRaw('post_year, post_month_number, post_month_name')
            ->orderBy('post_year','desc')
            ->orderBy('post_month_number','desc')
             ->get();
//       Paginator::useBootstrap();
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        View::share('categories',Category::all());
        View::share('all_posts',Post::all());
        View::share('archive',$archive);
        View::share('opt',config('blog.statuses.options'));

    }
}
