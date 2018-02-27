<?php

namespace App\Providers;

use App\Service\BookService;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookService::class, function ($app) {
            return new BookService(app(EntityManagerInterface::class));
        });
    }
}
