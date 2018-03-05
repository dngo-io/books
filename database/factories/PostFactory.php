<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Post::class, function (Faker $faker) {

    $categoryRepository = EntityManager::getRepository(\App\Entities\Category::class);
    $userRepository = EntityManager::getRepository(\App\Entities\User::class);

    $categories = [1,2,3];
    $categoryRand = mt_rand(1,count($categories));
    unset($categories[$categoryRand]);

    $categoriArray = new \Doctrine\Common\Collections\ArrayCollection();
    $categoryEntity = $categoryRepository->findById($categories);
    if (is_array($categoryEntity)) {
        foreach ($categoryEntity as $item) {
            $categoriArray->add($item);
        }
    }else{
        $categoriArray->add($categoryEntity);
    }

    return [
        'title' => $faker->sentence(),
        'categories' => $categoriArray,
        'user' => $userRepository->find(1),
        'status' => mt_rand(0,1),
        'isActive' => true,
        'createdAt' => new Carbon\Carbon(),
        'updatedAt' => new Carbon\Carbon()
    ];
});
