<?php

namespace App\Http\Controllers;

use App\Support\AppController;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager as Image;
use Illuminate\Support\Facades\Cache;

/**
 * Class ImageController
 *
 * @package App\Http\Controllers
 */
class ImageController extends AppController
{
    /**
     * @var Request $request
     */
    protected $request;

    /**
     * @var Image $image
     */
    protected $image;

    /**
     * ImageController constructor
     *
     * @param Request $request
     * @param Image $image
     */
    public function __construct(Request $request, Image $image)
    {
        $this->request = $request;
        $this->image   = $image;
    }

    /**
     * Image crop & cache
     *
     * @param Image $image
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function crop(Image $image)
    {
        $src   = $this->request->get('src');
        $size  = $this->request->get('size', 100);
        $cache = 'img_'.md5($src).'_'.$size;

        if (Cache::has($cache)) {
            $img = Cache::get($cache);
        } else {
            $img = $image->make($src)->fit($size, $size)->response('jpg');

            Cache::put($cache, $img, 43200);
        }

        return $img;
    }
}
