<?php

namespace App\Http\Controllers;

use App\Support\AppController;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager as Image;

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
     * @return mixed
     */
    public function crop()
    {
        $img = $this->image->cache(function($image) {
            /**
             * Get source from url
             */
            $src  = $this->request->get('src');

            /**
             * Get size from url
             */
            $size = $this->request->get('size', 100);
            /**
             * @var Image $image
             */
            return $image
                    ->make($src)
                    ->fit($size, $size);

        });

        return response($img, 200, array('Content-Type' => 'image/jpeg'));
    }
}
