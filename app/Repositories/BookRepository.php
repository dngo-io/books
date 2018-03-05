<?php

namespace App\Repositories;


use App\Support\AppEntityRepository;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;

/**
 * Class BookRepository
 * @package App\Repositories
 */
class BookRepository extends AppEntityRepository
{

    use PaginatesFromRequest;

    /**
     * @param Request $request
     * @param int $perPage
     * @param string $pageName
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getSearchResults(Request $request, $perPage = 10, $pageName = 'page')
    {
        $qb = $this->createQueryBuilder('b');

        //set language
        if($request->get('language')){
            $qb->andWhere('b.language = :language');
            $qb->setParameter('language',$request->get('language'));
        }

        //set year
        if ($request->get('year')) {
            $year = explode('-',$request->get('year'));

            $qb->andWhere("b.year BETWEEN :start AND :end")
                ->setParameter('start',$year[0])
                ->setParameter('end',$year[1]);
        }

        //categories

        dump($qb->getQuery());
        return $this->paginate($qb->getQuery(), $perPage, $pageName);
    }
}