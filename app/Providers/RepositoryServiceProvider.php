<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RegionRepository::class, \App\Repositories\RegionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DistrictRepository::class,
            \App\Repositories\DistrictRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TownshipRepository::class,
            \App\Repositories\TownshipRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CommentRepository::class,
            \App\Repositories\CommentRepositoryEloquent::class);
        //:end-bindings:
    }
}
