<?php

$factory->define(App\VideoServerType::class, function (Faker\Generator $faker) {
    return [
        "video_server_type" => $faker->name,
    ];
});
