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
        $this->composeCreate();

        $this->composeAuthGlobal();
    }

    /**
     * Compose the create job form with
     * necessary categories and job types.
     */
    public function composeCreate()
    {
        view()->composer(['create-job', 'edit-job'], function ($view) {
            $categories = Category::pluck('name', 'id');
            $types = Type::pluck('name', 'id');
            $view->with(compact('categories', 'types'));
        });
    }

    /**
     * Compose all views with the authenticated user
     * and variable checking if someone is logged in.
     */
    public function composeAuthGlobal()
    {
        view()->composer('*', function ($view) {
            $authUser = auth()->user();
            $isAuthenticated = auth()->check();
            $view->with(compact('authUser', 'isAuthenticated'));
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
