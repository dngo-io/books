<?php

namespace App\Service;

use App\Entities\AudioTags;
use App\Entities\Book;
use App\Entities\BookAudio;
use App\Entities\User;
use App\Http\Requests\StoreBookAudio;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

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

        $fileName = sprintf('%s_%s_%s_%s.%s',$book->getId(),$user->getId(),$request->get('chapter'),time(),'mp3');
        $filePath = sprintf('/%s/%s',$book->getId(),$fileName);
        $s3 = Storage::disk('s3');
        $upload = $s3->put($filePath, file_get_contents($file), 'public');

        if (!$upload) throw new UploadException();

        $audio = new BookAudio();
        $audio->setUser($user);
        $audio->setBook($book);
        $audio->setName($request->request->get('title'));
        $audio->setBody($request->request->get('content'));
        $audio->setFileSource($filePath);
        $audio->setChapter($request->get('chapter'));
        $audio->setLength(0); //js ile gelecek bu

        $tags = is_array($request->get('tags')) ? $request->get('tags') : [$request->get('tags')];

        //set tags
        if ($tags) {
            $setTags = new ArrayCollection();
            foreach ($tags as $item) {
                $tag = new AudioTags();
                $tag->setName($item);
                $tag->setSlug(str_slug($item));

                $setTags->add($tag);
            }
            $audio->setTags($setTags);
        }

        $this->entityManager->persist($audio);
        $this->entityManager->flush();
    }

    public function find($id)
    {
        $bookRepository = $this->entityManager->getRepository(BookAudio::class);

        /** @var BookAudio $bookAudio */
        $bookAudio = $bookRepository->findOneBy(['id' => $id]);

        return [
            'audio'   => [
                'name'       => $bookAudio->getName(),
                'file'       => $bookAudio->getFileSource(),
                'body'       => $bookAudio->getBody(),
                'chapter'    => $bookAudio->getChapter(),
                'status'     => $bookAudio->getStatus(),
                'created_at' => $bookAudio->getCreatedAt(),
            ],
            'user'    => [
                'account' => $bookAudio->getUser()->getAccount(),
                'name'    => $bookAudio->getUser()->getName()
            ],
            'book'    => [
                'id'   => $bookAudio->getBook()->getId(),
                'name' => $bookAudio->getBook()->getName()
            ],
            'author'  => [
                'id'   => $bookAudio->getBook()->getAuthor()->getId(),
                'name' => $bookAudio->getBook()->getAuthor()->getName()
            ],
        ];
    }

}