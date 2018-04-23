<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @param ViewFactory $view
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('*', 'App\Http\Composers\ModerationComposer');
    }

    public function register()
    {
        //
    }

}