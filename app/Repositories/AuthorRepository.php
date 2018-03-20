<?php


namespace App\Repositories;


use App\Support\AppEntityRepository;

class AuthorRepository extends AppEntityRepository
{

    public function findByName($name)
    {
        $qb = $this->createQueryBuilder("a");
        $qb->where('MATCH_AGAINST (a.name, :name) > 0.8');
        $qb->setParameter('name',$name);

        return $qb->getQuery()->getOneOrNullResult();
    }
}