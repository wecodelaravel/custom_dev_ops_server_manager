<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1553887107SyncserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('syncservers')) {
            Schema::create('syncservers', function (Blueprint $table) {
              $table->increments('id');
                $table->string('ss_name')->nullable();
                $table->string('ss_host_url')->nullable();
                $table->string('ss_hostip')->nullable();

                $table->string('grab_time')->nullable();
                $table->string('transcoding_server')->nullable();
                $table->integer('max_upload_filesize')->nullable()->unsigned()->default('500');

                $table->time('report_time')->nullable();
                $table->string('report_email')->default('mark.hurst@sling.com');

                $table->integer('max_days_channel_history')->nullable()->unsigned()->default('16');
                $table->string('real_time_notification_url')->nullable()->default('http://d-gp2-aanr-1.imovetv.com:8088/rpc');

                $table->tinyInteger('basic_discovery_enabled')->nullable()->default('0');
                $table->tinyInteger('continuous_discovery_enabled')->nullable()->default('0');

                $table->string('username')->nullable('caipy');
                $table->string('password')->nullable('caipy');
                $table->string('advanced_username')->nullable('caipy');
                $table->string('advanced_password')->nullable('Init1111');

                $table->tinyInteger('millisecond_precision')->nullable()->default('1');
                $table->tinyInteger('show_channel_button')->nullable()->default('1');
                $table->tinyInteger('show_clip_button')->nullable()->default('0');
                $table->tinyInteger('show_group_button')->nullable()->default('0');
                $table->tinyInteger('show_live_button')->nullable()->default('0');
                $table->tinyInteger('enable_evt')->nullable()->default('0');
                $table->tinyInteger('enable_excel')->nullable()->default('0');
                $table->string('enable_evt_timing')->nullable();

                $table->string('video_server_url')->nullable();
                $table->integer('video_hls_shift')->nullable();
                $table->string('video_server_redirect')->nullable();
                $table->string('hls_shift_per_channel')->nullable();

                $table->string('dai_ads_length')->nullable();
                $table->string('dai_notifications')->nullable();
                $table->string('dai_ad_lengths_per_channel')->nullable();
                $table->string('dai_offsets_per_channel')->nullable();
                $table->string('dai_min_per_hour_per_channel')->nullable();
                $table->string('dai_notify_gapper_channel')->nullable();
                $table->string('dai_ad_spacings_per_channel')->nullable();
                $table->string('dai_is_netlen_per_channel')->nullable();

                $table->string('imc')->nullable();
                $table->string('ip')->nullable();
                $table->string('itcpport')->nullable();

                $table->tinyInteger('mobile')->nullable()->default('0');
                $table->tinyInteger('record')->nullable()->default('1');
                $table->tinyInteger('clips')->nullable()->default('0');
                $table->tinyInteger('rtclips')->nullable()->default('0');
                $table->tinyInteger('p1_match')->nullable()->default('0');
                $table->tinyInteger('doublef0_match')->nullable()->default('0');
                $table->tinyInteger('full_match')->nullable()->default('0');
                $table->tinyInteger('do_notify_url')->nullable()->default('0');

                $table->string('clip_refresh_secs')->nullable()->default('20');
                $table->string('threshold_nr_p1_matches_times_hundred')->nullable()->default('60');
                $table->string('threshold_nr_doublef0_matches_times_hundred')->nullable()->default('60');
                $table->string('threshold_nr_3smatches_times_hundred')->nullable()->default('70');
                $table->string('threshold_nr_matches_times_hundred')->nullable()->default('60');
                $table->string('clip_len_notify_secs')->nullable()->default('3');
                $table->string('clip_notifyurl_script')->nullable()->default('/var/www/ftp/sh/notifyurl.sh');
                $table->string('clip_dir')->nullable()->default('/var/www/ftp/downloads');

                $table->string('cs_token')->nullable();
                $table->string('license')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syncservers');
    }
}
