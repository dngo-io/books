<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\BookAudio;
use App\Http\Requests\StoreBookAudio;
use App\Repositories\BookRepository;
use App\Service\BookAudioService;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Flysystem\Exception;

class AudioController extends AppController
{

    /**
     * @var BookAudioService
     */
    private $bookAudioService;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(BookAudioService $bookAudioService, EntityManagerInterface $entityManager)
    {
        $this->bookAudioService = $bookAudioService;
        $this->entityManager = $entityManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chosenBook = old('book');
        $chosenTags = old('tags');
        $tags       = [];
        $book       = null;
        if(!empty($chosenBook))
        {
            /** @var BookRepository $bookRepository */
            $bookRepository = $this->entityManager->getRepository(Book::class);

            $getBook = $bookRepository->findOneBy(['id' => $chosenBook]);
            $book    = [
                'id'   => $chosenBook,
                'text' => $getBook->getName().' - '.$getBook->getAuthor()->getName()
            ];
        }

        if(!empty($chosenTags))
        {
            $tags    = $chosenTags;
        }

        return view('audio-create', ['book' => $book, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookAudio|Request $request
     * @return array
     */
    public function store(StoreBookAudio $request)
    {
        /**
         * Required for slow uploaders. There is no elegant way to solve.
         * 3 Minutes
         */
        ini_set('max_execution_time', 180);

        try {
            $id = $this->bookAudioService->addAudio($request);
            return redirect("listen/$id");

        }catch (Exception $e) {
            return abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function image($id)
    {

        /** @var BookAudio $audio */
        $audio = $this->entityManager->getRepository(BookAudio::class)->find($id);

        if (!$audio) {
            abort(404);
        }

        //Set the Content Type
        header('Content-type: image/jpeg');

        // Create Image From Existing File
        $image = imagecreatefrompng(resource_path('assets/img/audio-bg.png'));

        // Allocate A Color For The Text
        $text_color = imagecolorallocate($image, 0, 0, 0);

        // Set Text to Be Printed On Image
        $text = $audio->getBook()->getName();

        $font_size = 16;
        $angle = 0;

        // Set Path to Font File
        $font_path = resource_path('assets/font/Roboto-Light.ttf');

        $center = $this->calculateImageCenter($image,$font_size,$angle,$font_path,$text);
        // book name
        imagettftext($image, $font_size, $angle, $center['x'], $center['y']+80, $text_color, $font_path, $text);

        // author name
        $text = 'by '.$audio->getBook()->getAuthor()->getName();
        $font_path = resource_path('assets/font/RobotoCondensed-Italic.ttf');
        $center = $this->calculateImageCenter($image,$font_size,$angle,$font_path,$text);
        imagettftext($image, $font_size, $angle, $center['x'], $center['y']+110, $text_color, $font_path, $text);

        // Send Image to Browser
        imagejpeg($image);

        // Clear Memory
        imagedestroy($image);

    }

    private function calculateImageCenter($image, $font_size, $angle, $font_path, $text)
    {
        // Get image dimensions
        $width = imagesx($image);
        $height = imagesy($image);

        // Get center coordinates of image
        $centerX = $width / 2;
        $centerY = $height / 2;

        // Get size of text
        list($left, $bottom, $right, , , $top) = imageftbbox($font_size, $angle, $font_path, $text);

        // Determine offset of text
        $left_offset = ($right - $left) / 2;
        $top_offset = ($bottom - $top) / 2;

        // Generate coordinates
        $x = $centerX - $left_offset;
        $y = $centerY - $top_offset;

        return ['x' => $x, 'y' => $y];
    }
}
