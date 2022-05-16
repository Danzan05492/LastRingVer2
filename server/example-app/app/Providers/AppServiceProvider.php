<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Info;
use App\Models\Category;

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
        //получаем посты в сайдбар
        view()->composer('layouts.front.sidebar',function($view){
            $view->with('popular_posts',Info::orderBy('views','desc')->limit(3)->get());
            //получаем категории в сайдбар
            $view->with('popular_cats',Category::withCount('posts')->orderBy('posts_count','desc')->get());
        });

    }
}
