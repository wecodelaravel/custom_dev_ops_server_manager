<?php

$factory->define(App\Csi::class, function (Faker\Generator $faker) {
    return [
        "channel_server_id" => factory('App\ChannelServer')->create(),
        "channel_id" => factory('App\Channel')->create(),
        "protocol_id" => factory('App\Protocol')->create(),
        "move_path" => $faker->name,
        "cs_token" => $faker->name,
    ];
});
