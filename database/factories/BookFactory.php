<?php

use Faker\Generator as Faker;


$factory->define(\App\Entities\Book::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence(mt_rand(2,5)),
        'author' => function() {
            return entity(\App\Entities\Author::class)->create();
        },
        'description' => $faker->text(),
        'isbn' => $faker->isbn10,
        'year' => (new Carbon\Carbon())->format('Y'),
        'releaseDate' => new Carbon\Carbon(),
        'page' => $faker->numberBetween(200,300),
        'cover' => $faker->imageUrl($width = 300, $height = 550),
        'post' => function() {
            return entity(\App\Entities\Post::class)->create();
        }
    ];
});
