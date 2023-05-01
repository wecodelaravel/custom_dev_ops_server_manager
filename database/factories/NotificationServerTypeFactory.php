<?php

$factory->define(App\NotificationServerType::class, function (Faker\Generator $faker) {
    return [
        "notification_server_type" => $faker->name,
    ];
});
