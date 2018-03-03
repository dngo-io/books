<?php
namespace App\Http\Controllers;

use App\Support\AppController;
use Watson\Sitemap\Sitemap;

class SitemapsController extends AppController
{
    /**
     * Sitemap helper.
     *
     * @see https://github.com/dwightwatson/sitemap
     *
     * @param Sitemap $sitemap
     * @return \Illuminate\Http\Response
     */
    public function index(Sitemap $sitemap)
    {

        // Get a general sitemap.
        //$sitemap->addSitemap('/sitemap/general');

        // You can use the route helpers too.
        //$sitemap->addSitemap(route('sitemap.posts'));

        // Return the sitemap to the client.
        return $sitemap->index();
    }
}