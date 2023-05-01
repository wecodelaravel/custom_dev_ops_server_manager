<?php

$factory->define(App\RoleConvention::class, function (Faker\Generator $faker) {
    return [
        "role_convention" => $faker->name,
        "role_convention_value" => $faker->name,
    ];
});
