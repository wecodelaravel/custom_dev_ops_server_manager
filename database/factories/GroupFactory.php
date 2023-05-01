<?php

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        "group" => $faker->randomNumber(2),
        "cs_token" => $faker->name,
        "details" => $faker->name,
        "notes" => $faker->name,
    ];
});
