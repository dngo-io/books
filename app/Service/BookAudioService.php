<?php

namespace App\Service;

use App\Entities\Book;
use App\Entities\BookAudio;
use App\Entities\User;
use App\Http\Requests\StoreBookAudio;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookAudioService
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function addAudio(StoreBookAudio $request)
    {
        $bookRepository = $this->entityManager->getRepository(Book::class);

        /** @var Book $book */
        $book = $bookRepository->find($request->request->get('book'));

        /** @var User $user */
        $user = Auth::user();

        //upload file here
        $file = $request->file('audio');

        $fileName = sprintf('%s_%s_%s.%s',$book->getId(),$user->getId(),time(),$file->getExtension());
        $filePath = sprintf('/%s/%s',$book->getId(),$fileName);
        $s3 = Storage::disk('s3');
        $s3->put($filePath, file_get_contents($file), 'public');

        $audio = new BookAudio();
        $audio->setUser($user);
        $audio->setBook($book);
        $audio->setName($request->request->get('title'));
        $audio->setLanguage($request->request->get('language'));
        $audio->setBody($request->request->get('content'));
        $audio->setFileSource('');

        $audio->setLength(0); //js ile gelecek bu

        $this->entityManager->persist($audio);
        $this->entityManager->flush();
    }

}