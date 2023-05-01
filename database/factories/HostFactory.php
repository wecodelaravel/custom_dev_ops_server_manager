<?php

$factory->define(App\Host::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "host" => $faker->name,
        "server_exists" => 0,
        "caipy_is_setup" => 0,
        "ready_to_receive_conf" => 0,
        "last_received_conf" => $faker->date("m/d/Y H:i:s", $max = 'now'),
        "configured" => 0,
        "notes" => $faker->name,
        "cs_token" => $faker->name,
        "group_id" => factory('App\Group')->create(),
        "status_id" => factory('App\Status')->create(),
        "instance_id" => factory('App\Instance')->create(),
        "rc_id" => factory('App\RoleConvention')->create(),
        "ss_func_id" => factory('App\SyncServerFunction')->create(),
    ];
});
