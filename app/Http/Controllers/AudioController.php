<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookAudio;
use App\Service\BookAudioService;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class AudioController extends AppController
{

    /**
     * @var BookAudioService
     */
    private $bookAudioService;

    public function __construct(BookAudioService $bookAudioService)
    {

        $this->bookAudioService = $bookAudioService;
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
        return view('audio-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookAudio|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookAudio $request)
    {
        try {
            $this->bookAudioService->addAudio($request);
        }catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
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
}
