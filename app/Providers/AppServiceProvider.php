<?php

namespace App\Providers;

use App\Service\BookService;
use App\Service\BookAudioService;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package    App\Providers
 * @subpackage App\Providers\AppServiceProvider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Book Service
         */
        $this->app->bind(BookService::class, function ($app) {
            return new BookService(
                app(EntityManagerInterface::class)
            );
        });

        /**
         * BookAudioService
         */
        $this->app->bind(BookAudioService::class , function ($app) {
            return new BookService(
                app(EntityManagerInterface::class)
            );
        });
    }
}
