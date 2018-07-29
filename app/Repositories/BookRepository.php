<?php

namespace App\Repositories;


use App\Entities\Post;
use App\Support\AppEntityRepository;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;

/**
 * Class BookRepository
 * @package App\Repositories
 */
class BookRepository extends AppEntityRepository
{

    const RANGE_SLIDER_DELIMITER = ';';

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

        //book name
        if ($request->get('name')) {
            $qb->where('MATCH_AGAINST (b.name, :searchTerm) > 0');
            $qb->setParameter('searchTerm',"'" . $request->get('name') . "*'");
        }

        //set language
        if($request->get('language')){
            $qb->andWhere('b.language IN (:language)');
            $qb->setParameter('language',$request->get('language'));
        }else{
            $qb->andWhere('b.language IN (:language)'); // will be deleted in future
            $qb->setParameter('language',['tr','en']);
        }

        //set year
        if ($request->get('year')) {
            $year = explode(self::RANGE_SLIDER_DELIMITER,$request->get('year'));
            if( !empty($year[0]) && !empty($year[1])) {
                $qb->andWhere("b.year BETWEEN :start AND :end")
                    ->setParameter('start',$year[0])
                    ->setParameter('end',$year[1]);
            }
        }

        //categories
        if (
            $request->get('category')
            &&
            is_array($request->get('category'))
            &&
            count($request->get('category')) > 0
        )
        {
            $qb->join('b.post','p');
            $qb->innerJoin('p.categories','c');
            $qb->andWhere('c.id IN (:categories)');
            $qb->setParameter('categories',implode(',',$request->get('category')));
            $qb->groupBy('b.id');
        }

        /** TODO Request'den al bunu */
        $qb->orderBy("b.priority");

        $result = $qb->getQuery()->useQueryCache(false);

        return $this->paginate($result, $perPage, $pageName);
    }

    /**
     * @param $name
     * @param int $limit
     * @return array|mixed
     */
    public function findByName($name, $limit = 10)
    {
        //book name
        if ($name) {
            $qb = $this->createQueryBuilder('b');

            $qb->where('MATCH_AGAINST (b.name, :searchTerm) > 0');
            $qb->setParameter('searchTerm',"'".$name."*'");

            $qb->join('b.post','p');
            $qb->groupBy('b.id');
            $qb->setMaxResults($limit);
            return $qb->getQuery()->getResult();

        }

        return [];
    }
}