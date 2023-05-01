<?php

$factory->define(App\ChannelServer::class, function (Faker\Generator $faker) {
    return [
        "group_id" => factory('App\Group')->create(),
        "cs_name" => $faker->name,
        "cs_host" => $faker->name,
        "cs_host_ip" => $faker->name,
        "cs_token" => $faker->name,
        "notes" => $faker->name,
        "username" => $faker->name,
        "password" => $faker->name,
        "host_id" => factory('App\Host')->create(),
        "default_cloud_a_address" => $faker->name,
        "default_cloud_a_port" => $faker->name,
        "default_cloud_b_address" => $faker->name,
        "default_cloud_b_port" => $faker->name,
        "local_output" => $faker->name,
        "local_output_port" => $faker->name,
        "license" => $faker->name,
    ];
});
