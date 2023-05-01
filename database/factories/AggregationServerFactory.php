<?php

$factory->define(App\AggregationServer::class, function (Faker\Generator $faker) {
    return [
        "group_id" => factory('App\Group')->create(),
        "channel_server_id" => factory('App\ChannelServer')->create(),
        "as_name" => $faker->name,
        "as_host_url" => $faker->name,
        "as_hostip" => $faker->name,
        "grab_time" => $faker->name,
        "transcoding_server" => $faker->name,
        "max_upload_filesize" => $faker->randomNumber(2),
        "report_time" => $faker->date("H:i:s", $max = 'now'),
        "report_email" => $faker->safeEmail,
        "max_days_channel_history" => $faker->randomNumber(2),
        "notification_server_type_id" => factory('App\NotificationServerType')->create(),
        "real_time_notification_url" => $faker->name,
        "basic_discovery_enabled" => 0,
        "continuous_discovery_enabled" => 0,
        "username" => $faker->name,
        "password" => $faker->name,
        "advanced_username" => $faker->name,
        "advanced_password" => $faker->name,
        "millisecond_precision" => 1,
        "show_channel_button" => 1,
        "show_clip_button" => 0,
        "show_group_button" => 0,
        "show_live_button" => 0,
        "enable_evt" => 0,
        "enable_excel" => 0,
        "enable_evt_timing" => $faker->name,
        "timezone_id" => factory('App\Timezone')->create(),
        "filter_preset_for_ui_id" => factory('App\Filter')->create(),
        "country_id" => factory('App\Country')->create(),
        "video_server_type_id" => factory('App\VideoServerType')->create(),
        "video_server_url" => $faker->name,
        "video_server_redirect" => $faker->name,
        "video_hls_shift" => $faker->randomNumber(2),
        "dai_ads_length" => $faker->name,
        "dai_notifications" => $faker->name,
        "hls_shift_per_channel" => $faker->name,
        "dai_ad_lengths_per_channel" => $faker->name,
        "dai_offsets_per_channel" => $faker->name,
        "dai_min_per_hour_per_channel" => $faker->name,
        "dai_notify_gapper_channel" => $faker->name,
        "dai_ad_spacings_per_channel" => $faker->name,
        "dai_is_netlen_per_channel" => $faker->name,
        "host_id" => factory('App\Host')->create(),
        "imc" => $faker->name,
        "ip" => $faker->name,
        "itcpport" => $faker->name,
        "mobile" => 0,
        "clips" => 0,
        "rtclips" => 0,
        "p1_match" => $faker->name,
        "doublef0_match" => 0,
        "full_match" => 0,
        "do_notify_url" => 0,
        "record" => 0,
        "clip_refresh_secs" => $faker->name,
        "threshold_nr_p1_matches_times_hundred" => $faker->name,
        "threshold_nr_doublef0_matches_times_hundred" => $faker->name,
        "threshold_nr_3smatches_times_hundred" => $faker->name,
        "threshold_nr_matches_times_hundred" => $faker->name,
        "clip_len_notify_secs" => $faker->name,
        "clip_notifyurl_script" => $faker->name,
        "clip_dir" => $faker->name,
        "license" => $faker->name,
        "cs_token" => $faker->name,
    ];
});
