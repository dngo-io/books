<?php


namespace App\Repositories;


use App\Support\AppEntityRepository;
use App\Support\Traits\Repository\FindBySlug;

class CategoryRepository extends AppEntityRepository
{
    use FindBySlug;


    /**
     * @param $id
     * @return array|mixed
     */
    public function findById($id)
    {
        $qb = $this->createQueryBuilder('o');

        if (is_array($id)) {
            $qb->where('o.id IN (:id)');
            $qb->setParameter('id',$id);
            return $qb->getQuery()->execute();
        }else {
            return [$this->find($id)];
        }

    }
}