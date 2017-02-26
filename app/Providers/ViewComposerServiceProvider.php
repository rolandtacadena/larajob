<?php

namespace App\Providers;

use App\Category;
use App\Type;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('create', function ($view) {
            $categories = Category::pluck('name', 'id');
            $types = Type::pluck('name', 'id');
            $view->with(compact('categories', 'types'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
