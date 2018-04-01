<?php

namespace App\Repositories;

use App\Entities\Book;
use App\Entities\BookAudio;
use App\Support\Contracts\Repository\UserRepository as UserRepositoryContract;
use App\Entities\User;
use App\Support\AppEntityRepository;
use App\Support\Traits\Repository\FindByName;
use App\Support\Traits\Repository\FindByUUID;
use Doctrine\ORM\Query\Expr\Join;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;

/**
 * Class UserRepository
 *
 * @package    App\Repositories
 * @subpackage App\Repositories\UserRepository
 */
class UserRepository extends AppEntityRepository implements UserRepositoryContract
{

    const ACTIVE = 1;

    use FindByName;
    use FindByUUID;
    use PaginatesFromRequest;
    /**
     * Return
     *
     * @param string $account
     *
     * @return null|User
     */
    public function findOneByAccount($account)
    {
        return $this->findOneBy(['account' => $account]);
    }

    /**
     * @param $account
     * @param int $hydrate
     * @return array|mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findProfileByAccount($account, $hydrate = 1)
    {
        //account name
        if ($account) {
            $qb = $this->createQueryBuilder('u');

            $qb->select(['u', 'COUNT(ba) as contribution']);

            $qb->leftJoin('App\Entities\BookAudio', 'ba', \Doctrine\ORM\Query\Expr\Join::WITH, 'u.id = ba.user');

            $qb->where('u.account = :username');
            $qb->setParameter('username', $account);

            $qb->andWhere('ba.status = :status');
            $qb->setParameter('status', BookAudioRepository::STATUS_APPROVED);

            $qb->setMaxResults(1);

            return $qb->getQuery()->getSingleResult($hydrate);

        }

        return [];
    }

    /**
     * @param $account
     * @param int $limit
     * @return array
     */
    public function findByAccount($account, $limit = 10)
    {
        //account name
        if ($account) {
            $qb = $this->createQueryBuilder('u')->select(['u.account', 'u.name', 'u.profileImage']);

            $qb->where('u.account LIKE :username');
            $qb->setParameter('username', "%$account%");
            $qb->setMaxResults($limit);

            return $qb->getQuery()->getArrayResult();

        }

        return [];
    }

    /**
     * Count users
     *
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function countAccounts()
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select($qb->expr()->count('u'));

        $query = $qb->getQuery();

        return $query->getSingleResult();
    }

    /**
     * User list
     *
     * @param string $account  Filter by account name
     * @param int    $perPage  Show per page
     * @param string $pageName Page index
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function userList(string $account = '', int $perPage = 10, string $pageName = 'page')
    {
        $qb = $this->createQueryBuilder('u');

        if($account)
        {
            $qb->where('u.account LIKE :username');
            $qb->setParameter('username', "%$account%");
        }

        $result = $qb->getQuery()->useQueryCache(true);

        return $this->paginate($result, $perPage, $pageName);
    }
}
