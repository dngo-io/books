<?php


namespace App\Http\Controllers\Api;


use App\Repositories\SpeechRepository;
use App\Service\SpeechService;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpeechController extends AppController
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function index(Request $request)
    {
        $text = $request->get("text");
        $language = $request->get("language");
        $module = $request->get("module");

        $speechRepo = $this->entityManager->getRepository(SpeechRepository::class);

        $speeches = $speechRepo->findBy(["module" => $module, "language" => $language]);

        //resolve and get actions
        $speechService = new SpeechService($speeches);

        $response = $speechService
            ->setQuestion($text)
            ->resolve()
            ->getResponse();

        header('content-type: application/json; charset=utf-8');
        return new JsonResponse($response);

    }
}