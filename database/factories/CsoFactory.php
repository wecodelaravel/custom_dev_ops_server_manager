<?php

$factory->define(App\Cso::class, function (Faker\Generator $faker) {
    return [
        "use_channel_server_localhost" => 0,
        "channel_server_id" => factory('App\ChannelServer')->create(),
        "channel_id" => factory('App\Channel')->create(),
        "use_as_for_a" => 0,
        "select_aggregation_server_for_a_id" => factory('App\AggregationServer')->create(),
        "use_sync_server_for_a" => 0,
        "select_sync_server_for_a_id" => factory('App\Syncserver')->create(),
        "use_custom_a" => 0,
        "ocloud_a" => $faker->name,
        "ocp_a" => $faker->randomNumber(2),
        "use_as_for_b" => 0,
        "select_aggregation_server_for_b_id" => factory('App\AggregationServer')->create(),
        "use_sync_server_for_b" => 0,
        "select_sync_server_for_b_id" => factory('App\Syncserver')->create(),
        "use_custom_for_b" => 0,
        "ocloud_b" => $faker->name,
        "ocp_b" => $faker->name,
    ];
});
