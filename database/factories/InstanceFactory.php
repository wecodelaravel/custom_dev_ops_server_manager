<?php

$factory->define(App\Instance::class, function (Faker\Generator $faker) {
    return [
        "group_id" => factory('App\Group')->create(),
        "quantity_to_create" => $faker->randomNumber(2),
        "role_convention_id" => factory('App\RoleConvention')->create(),
        "channel_server_id" => factory('App\ChannelServer')->create(),
        "aggregation_server_id" => factory('App\AggregationServer')->create(),
        "env_id" => factory('App\Environment')->create(),
        "details" => $faker->name,
        "notes" => $faker->name,
        "cs_token" => $faker->name,
    ];
});
