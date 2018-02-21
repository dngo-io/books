<?php


namespace App\Repositories;


use App\Support\AppEntityRepository;
use App\Support\Traits\Repository\FindBySlug;

class CategoryRepository extends AppEntityRepository
{
    use FindBySlug;

}