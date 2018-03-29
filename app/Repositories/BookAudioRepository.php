<?php

namespace App\Repositories;


use App\Entities\Book;
use App\Entities\User;
use App\Support\AppEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
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

        $qb->andWhere('a.status IN (:status)');
        //status
        if ($request->get('status')) {
            $qb->setParameter('status',$request->get('status'));
        } else {
            $qb->setParameter('status',['pending']);
        }

        //set language
        if($request->get('language')){
            $qb->andWhere('b.language = :language');
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
                $qb->orderBy('b.author');

            if ($request->get('order_by') == self::ORDER_BY_BOOK)
                $qb->orderBy('b.id');

            if ($request->get('order_by') == self::ORDER_BY_DATE)
                $qb->orderBy('a.createdAt');

            if ($request->get('order_by') == self::ORDER_BY_LANGUAGE)
                $qb->orderBy('b.language');
        }

        $result = $qb->getQuery()->useQueryCache(false);

        return $this->paginate($result, $perPage, $pageName);
    }


    /**
     * @param Request $request
     * @param $account
     * @param int $perPage
     * @param string $pageName
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getUserFeed(Request $request, $account = null, $perPage = 10, $pageName = 'page')
    {
        $qb = $this->createQueryBuilder('ba');

        $qb->join(Book::class,'b', Join::WITH, 'ba.book = b.id');
        $qb->join(User::class,'u', Join::WITH, 'ba.user = u.id');

        if ($account) {
            $qb->where('u.account = :account');
            $qb->setParameter('account',$account);
        }

        $qb->andWhere('ba.status = :status');
        $status = NULL !== $request->request->get('status') ? $request->request->get('status') : self::STATUS_APPROVED;
        $qb->setParameter('status',$status);

        $qb->orderBy('ba.id','desc');

        $result = $qb->getQuery()->useQueryCache(true);

        return $this->paginate($result, $perPage, $pageName);
    }

}