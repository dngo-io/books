<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\BookAudio::class, function (Faker $faker) {

    $languages = ['en','fr','tr','de','sp'];
    $randLang = mt_rand(0,count($languages)-1);
    return [
        'user_id' => 1,
        'book_id' => mt_rand(1,500),
        'name' => $faker->sentence(mt_rand(2,5)),
        'body' => $faker->text(),
        'chapter' => $faker->numberBetween(10,20),
        'isActive' => true,
        'status' => mt_rand(0,3),
        'length' => 0,
        'fileSource' => implode('/', explode(" ",$faker->sentence(3))),
        'language' => $languages[$randLang],
        'createdAt' => $faker->dateTime(),
        'updatedAt' => $faker->dateTime(),
    ];
});
