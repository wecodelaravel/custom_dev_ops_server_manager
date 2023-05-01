<?php

use Illuminate\Database\Seeder;

class AggregationServersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aggregation_servers')->delete();
        
        \DB::table('aggregation_servers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'as_name' => 'd-gp2-aaas1-1',
                'as_host_url' => 'd-gp2-aaas1-1.imovetv.com',
                'as_hostip' => NULL,
                'grab_time' => NULL,
                'transcoding_server' => NULL,
                'max_upload_filesize' => 500,
                'report_time' => NULL,
                'report_email' => 'mark.hurst@sling.com',
                'max_days_channel_history' => 16,
                'real_time_notification_url' => 'http://d-gp2-aanr-1.imovetv.com:8088/rpc',
                'basic_discovery_enabled' => 0,
                'continuous_discovery_enabled' => 0,
                'username' => NULL,
                'password' => NULL,
                'advanced_username' => NULL,
                'advanced_password' => NULL,
                'millisecond_precision' => 1,
                'show_channel_button' => 1,
                'show_clip_button' => 0,
                'show_group_button' => 0,
                'show_live_button' => 0,
                'enable_evt' => 0,
                'enable_excel' => 0,
                'enable_evt_timing' => NULL,
                'video_server_url' => 'http://d-gp2-cache0-1.d.movetv.com/clipslist/CHANNELNAME/EPOCHSTART/EPOCHEND/master_3_5_internal.m3u8',
                'video_server_redirect' => NULL,
                'video_hls_shift' => NULL,
                'dai_ads_length' => NULL,
                'dai_notifications' => NULL,
                'hls_shift_per_channel' => NULL,
                'dai_ad_lengths_per_channel' => NULL,
                'dai_offsets_per_channel' => NULL,
                'dai_min_per_hour_per_channel' => NULL,
                'dai_notify_gapper_channel' => NULL,
                'dai_ad_spacings_per_channel' => NULL,
                'dai_is_netlen_per_channel' => NULL,
                'imc' => NULL,
                'ip' => NULL,
                'itcpport' => '8080',
                'mobile' => 0,
                'clips' => 0,
                'rtclips' => 0,
                'p1_match' => 0,
                'doublef0_match' => 0,
                'full_match' => 0,
                'do_notify_url' => 0,
                'record' => 1,
                'clip_refresh_secs' => '20',
                'threshold_nr_p1_matches_times_hundred' => '60',
                'threshold_nr_doublef0_matches_times_hundred' => '60',
                'threshold_nr_3smatches_times_hundred' => '70',
                'threshold_nr_matches_times_hundred' => '60',
                'clip_len_notify_secs' => '3',
                'clip_notifyurl_script' => '/var/www/ftp/sh/notifyurl.sh',
                'clip_dir' => '/var/www/ftp/downloads',
                'license' => 'LIC=ChannelServer-AA-1.0-20991231-20190712-DISHCS!D-GP2-AAAS1-1!00000000000000000000000000',
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:07',
                'updated_at' => '2019-07-12 21:33:07',
                'deleted_at' => NULL,
                'group_id' => 1,
                'channel_server_id' => 1,
                'notification_server_type_id' => NULL,
                'timezone_id' => NULL,
                'filter_preset_for_ui_id' => NULL,
                'country_id' => NULL,
                'video_server_type_id' => NULL,
                'host_id' => 2,
            ),
        ));
        
        
    }
}