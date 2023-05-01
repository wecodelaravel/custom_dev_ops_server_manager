<?php

$factory->define(App\Channel::class, function (Faker\Generator $faker) {
    return [
        "source_name" => $faker->name,
        "channelid" => $faker->name,
        "env" => $faker->name,
        "ffmpegsource" => $faker->name,
        "ssm" => $faker->name,
        "imc" => $faker->name,
        "port" => $faker->name,
        "pid" => $faker->name,
        "source_ip" => $faker->name,
        "udp" => $faker->name,
        "valid_as_of" => $faker->date("m/d/Y H:i:s", $max = 'now'),
        "csi_id" => factory('App\Csi')->create(),
    ];
});
