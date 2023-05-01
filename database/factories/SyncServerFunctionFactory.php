<?php

$factory->define(App\SyncServerFunction::class, function (Faker\Generator $faker) {
    return [
        "type" => $faker->name,
        "description" => $faker->name,
    ];
});
