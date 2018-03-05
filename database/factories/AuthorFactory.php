<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
