<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        Model::preventLazyLoading(! $this->app->isProduction());
        Paginator::useBootstrapFive();

        View::composer('front.app.navbar', function ($view) {
            $categories = Category::withCount(['products'])
                ->orderBy('name')
                ->get();

            $authors = Author::withCount(['products'])
                ->orderBy('name')
                ->get();

            $publishers = Publisher::withCount(['products'])
                ->orderBy('name')
                ->get();

            $brands = Brand::withCount(['products'])
                ->orderBy('name')
                ->get();

            return $view->with([
                'categories' => $categories,
                'authors' => $authors,
                'publishers' => $publishers,
                'brands' => $brands,
            ]);
        });
    }
}
