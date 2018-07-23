<?php

use Faker\Generator as Faker;


$factory->define(\App\Entities\Book::class, function (Faker $faker) {

    $languages = ['en','fr','tr','de','sp'];
    $randLang = mt_rand(0,count($languages)-1);

    return [
        'name' => $faker->sentence(mt_rand(2,5)),
        'author' => function() {
            return entity(\App\Entities\Author::class)->create();
        },
        'description' => $faker->text(),
        'isbn' => $faker->isbn10,
        'year' => mt_rand(1920,2018),
        'releaseDate' => new Carbon\Carbon(),
        'page' => $faker->numberBetween(200,300),
        'cover' => $faker->imageUrl($width = 300, $height = 550),
        'priority' => $faker->randomNumber(),
        'post' => function() {
            return entity(\App\Entities\Post::class)->create();
        },
        'language' => $languages[$randLang],
        'gutenbergId' => $faker->numberBetween(10000,99999),
        'gutenbergFiles' => ['epub-url','pdf-url','txt-url']
    ];
});
