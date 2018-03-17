<?php

namespace App\Repositories;

use App\Support\Contracts\Repository\UserRepository as UserRepositoryContract;
use App\Entities\User;
use App\Support\AppEntityRepository;
use App\Support\Traits\Repository\FindByName;
use App\Support\Traits\Repository\FindByUUID;

/**
 * Class UserRepository
 *
 * @package    App\Repositories
 * @subpackage App\Repositories\UserRepository
 */
class UserRepository extends AppEntityRepository implements UserRepositoryContract
{

    use FindByName;
    use FindByUUID;

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
     * @return array|mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findProfileByAccount($account)
    {
        //account name
        if ($account) {
            $qb = $this->createQueryBuilder('u')->select(['u', 'COUNT(ba) as contribution']);

            $qb->leftJoin('App\Entities\BookAudio', 'ba', \Doctrine\ORM\Query\Expr\Join::WITH, 'u.id = ba.user');

            $qb->where('u.account = :username');
            $qb->setParameter('username', $account);

            $qb->andWhere('ba.status = :status');
            $qb->setParameter('status', 1);

            $qb->setMaxResults(1);

            return $qb->getQuery()->getSingleResult();

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
}
