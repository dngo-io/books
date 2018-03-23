<?php

namespace App\Providers;

use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Service\BookService;
use App\Service\BookAudioService;
use App\Service\Importer\ArchiveImport;
use App\Service\Importer\IsKulturImport;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;
use Somnambulist\EntityValidation\Factories\EntityValidationFactory;

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
            return new BookAudioService(
                app(EntityManagerInterface::class)
            );
        });


        /**
         * Importer
         */

        $this->app->bind(ArchiveImport::class, function($app) {
            return new ArchiveImport(
                app(EntityManagerInterface::class),
                app(AuthorRepository::class),
                app(BookRepository::class),
                app(EntityValidationFactory::class)
            );
        });

        $this->app->bind(IsKulturImport::class, function($app) {
            return new IsKulturImport(
                app(EntityManagerInterface::class),
                app(AuthorRepository::class),
                app(BookRepository::class),
                app(EntityValidationFactory::class)
            );
        });

    }
}
