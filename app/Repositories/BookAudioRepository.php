<?php

namespace App\Repositories;


use App\Support\AppEntityRepository;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;

/**
 * Class BookAudioRepository
 * @package App\Repositories
 */
class BookAudioRepository extends AppEntityRepository
{
    use PaginatesFromRequest;

    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 2;
    const STATUS_NO_CONTRIBUTION = 3;

    const AUDIO_STATUS = array(
        0 => 'STATUS_PENDING',
        1 => 'STATUS_APPROVED',
        2 => 'STATUS_REJECTED',
        3 => 'STATUS_NO_CONTRIBUTION'
    );

    const ORDER_BY_LANGUAGE = 'language';
    const ORDER_BY_DATE = 'date';
    const ORDER_BY_BOOK = 'book';
    const ORDER_BY_AUTHOR = 'author';

    /**
     * @param Request $request
     * @param int $perPage
     * @param string $pageName
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function searchByRequest(Request $request, $perPage = 10, $pageName = 'page')
    {
        $qb = $this
            ->createQueryBuilder('a')
            ->innerJoin('a.book','b');

        //status
        if ($request->get('status')) {
            $qb->andWhere('a.status IN (:status)');
            $qb->setParameter('status',$request->get('status'));
        }

        //set language
        if($request->get('language')){
            $qb->andWhere('b.language IN (:language)');
            $qb->setParameter('language',$request->get('language'));
        }

        //user
        if($request->get('user')){
            $qb->innerJoin('a.user','u');
            $qb->andWhere('u.account LIKE :username');
            $qb->setParameter('username', '%'.$request->get('user').'%');
        }

        //order by
        if($request->get('order_by')){

            if ($request->get('order_by') == self::ORDER_BY_AUTHOR)
                $qb->orderBy("b.author");

            if ($request->get('order_by') == self::ORDER_BY_BOOK)
                $qb->orderBy('a.book');

            if ($request->get('order_by') == self::ORDER_BY_DATE)
                $qb->orderBy('a.create_at');

            if ($request->get('order_by') == self::ORDER_BY_LANGUAGE)
                $qb->orderBy('b.language');
        }

        $result = $qb->getQuery()->useQueryCache(false);

        return $this->paginate($result, $perPage, $pageName);
    }
}