<?php


namespace App\Repositories;

use App\Entities\BookAudio;
use App\Support\AppEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;
use Symfony\Component\HttpFoundation\Request;

class SteemLogRepository extends AppEntityRepository
{

    use PaginatesFromRequest;

    /**
     * @param Request $request
     * @param int $perPage
     * @param string $pageName
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function findApprovedAudios(Request $request, $perPage = 10,$pageName = 'page')
    {
        $qb = $this->createQueryBuilder("l");
        $qb->join(BookAudio::class,"a",Join::WITH, "a.id = l.bookAudio");
        $qb->where("a.status = 1");

        return $this->paginate($qb->getQuery(),$perPage,$pageName);
    }
}