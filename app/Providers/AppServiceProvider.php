<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CategoryInterface;
use App\Repositories\Repos\CategoryRepository;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Repos\ProductRepository;
use App\Repositories\Interfaces\FeedbackInterface;
use App\Repositories\Repos\FeedbackRepository;
use App\Repositories\Interfaces\InfomationInterface;
use App\Repositories\Repos\InfomationRepository;
use App\Repositories\Interfaces\ServiceInterface;
use App\Repositories\Repos\ServiceRepository;
use App\Repositories\Interfaces\AboutInterface;
use App\Repositories\Repos\AboutRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            FeedbackInterface::class,
            FeedbackRepository::class
        );
        $this->app->bind(
            InfomationInterface::class,
            InfomationRepository::class
        );
        $this->app->bind(
            ServiceInterface::class,
            ServiceRepository::class
        );
        $this->app->bind(
            AboutInterface::class,
            AboutRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
