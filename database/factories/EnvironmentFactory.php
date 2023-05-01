<?php

$factory->define(App\Environment::class, function (Faker\Generator $faker) {
    return [
        "environment" => $faker->name,
        "env_value" => $faker->name,
    ];
});
