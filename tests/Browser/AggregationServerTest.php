<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class AggregationServerTest extends DuskTestCase
{
    public function testCreateAggregationServer()
    {
        $admin = \App\User::find(1);
        $aggregation_server = factory('App\AggregationServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $aggregation_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregation_servers.index'))
                ->clickLink('Add new')
                ->select("channel_server_id", $aggregation_server->channel_server_id)
                ->type("as_name", $aggregation_server->as_name)
                ->type("as_host_url", $aggregation_server->as_host_url)
                ->type("as_hostip", $aggregation_server->as_hostip)
                ->type("transcoding_server", $aggregation_server->transcoding_server)
                ->type("max_upload_filesize", $aggregation_server->max_upload_filesize)
                ->type("report_time", $aggregation_server->report_time)
                ->type("report_email", $aggregation_server->report_email)
                ->type("max_days_channel_history", $aggregation_server->max_days_channel_history)
                ->select("notification_server_type_id", $aggregation_server->notification_server_type_id)
                ->type("real_time_notification_url", $aggregation_server->real_time_notification_url)
                ->check("basic_discovery_enabled")
                ->check("continuous_discovery_enabled")
                ->type("username", $aggregation_server->username)
                ->type("password", $aggregation_server->password)
                ->type("advanced_username", $aggregation_server->advanced_username)
                ->type("advanced_password", $aggregation_server->advanced_password)
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->check("show_clip_button")
                ->check("show_group_button")
                ->check("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->type("enable_evt_timing", $aggregation_server->enable_evt_timing)
                ->select("timezone_id", $aggregation_server->timezone_id)
                ->select("filter_preset_for_ui_id", $aggregation_server->filter_preset_for_ui_id)
                ->select("country_id", $aggregation_server->country_id)
                ->select("video_server_type_id", $aggregation_server->video_server_type_id)
                ->type("video_server_url", $aggregation_server->video_server_url)
                ->type("video_server_redirect", $aggregation_server->video_server_redirect)
                ->type("video_hls_shift", $aggregation_server->video_hls_shift)
                ->type("cs_token", $aggregation_server->cs_token)
                ->press('Save')
                ->assertRouteIs('admin.aggregation_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $aggregation_server->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='as_name']", $aggregation_server->as_name)
                ->assertSeeIn("tr:last-child td[field-key='as_host_url']", $aggregation_server->as_host_url)
                ->assertSeeIn("tr:last-child td[field-key='as_hostip']", $aggregation_server->as_hostip)
                ->logout();
        });
    }

    public function testEditAggregationServer()
    {
        $admin = \App\User::find(1);
        $aggregation_server = factory('App\AggregationServer')->create();
        $aggregation_server2 = factory('App\AggregationServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $aggregation_server, $aggregation_server2) {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregation_servers.index'))
                ->click('tr[data-entry-id="' . $aggregation_server->id . '"] .btn-info')
                ->select("channel_server_id", $aggregation_server2->channel_server_id)
                ->type("as_name", $aggregation_server2->as_name)
                ->type("as_host_url", $aggregation_server2->as_host_url)
                ->type("as_hostip", $aggregation_server2->as_hostip)
                ->type("transcoding_server", $aggregation_server2->transcoding_server)
                ->type("max_upload_filesize", $aggregation_server2->max_upload_filesize)
                ->type("report_time", $aggregation_server2->report_time)
                ->type("report_email", $aggregation_server2->report_email)
                ->type("max_days_channel_history", $aggregation_server2->max_days_channel_history)
                ->select("notification_server_type_id", $aggregation_server2->notification_server_type_id)
                ->type("real_time_notification_url", $aggregation_server2->real_time_notification_url)
                ->check("basic_discovery_enabled")
                ->check("continuous_discovery_enabled")
                ->type("username", $aggregation_server2->username)
                ->type("password", $aggregation_server2->password)
                ->type("advanced_username", $aggregation_server2->advanced_username)
                ->type("advanced_password", $aggregation_server2->advanced_password)
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->check("show_clip_button")
                ->check("show_group_button")
                ->check("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->type("enable_evt_timing", $aggregation_server2->enable_evt_timing)
                ->select("timezone_id", $aggregation_server2->timezone_id)
                ->select("filter_preset_for_ui_id", $aggregation_server2->filter_preset_for_ui_id)
                ->select("country_id", $aggregation_server2->country_id)
                ->select("video_server_type_id", $aggregation_server2->video_server_type_id)
                ->type("video_server_url", $aggregation_server2->video_server_url)
                ->type("video_server_redirect", $aggregation_server2->video_server_redirect)
                ->type("video_hls_shift", $aggregation_server2->video_hls_shift)
                ->type("cs_token", $aggregation_server2->cs_token)
                ->press('Update')
                ->assertRouteIs('admin.aggregation_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $aggregation_server2->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='as_name']", $aggregation_server2->as_name)
                ->assertSeeIn("tr:last-child td[field-key='as_host_url']", $aggregation_server2->as_host_url)
                ->assertSeeIn("tr:last-child td[field-key='as_hostip']", $aggregation_server2->as_hostip)
                ->logout();
        });
    }

    public function testShowAggregationServer()
    {
        $admin = \App\User::find(1);
        $aggregation_server = factory('App\AggregationServer')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $aggregation_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregation_servers.index'))
                ->click('tr[data-entry-id="' . $aggregation_server->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_server']", $aggregation_server->channel_server->cs_host)
                ->assertSeeIn("td[field-key='as_name']", $aggregation_server->as_name)
                ->assertSeeIn("td[field-key='as_host_url']", $aggregation_server->as_host_url)
                ->assertSeeIn("td[field-key='as_hostip']", $aggregation_server->as_hostip)
                ->assertSeeIn("td[field-key='transcoding_server']", $aggregation_server->transcoding_server)
                ->assertSeeIn("td[field-key='max_upload_filesize']", $aggregation_server->max_upload_filesize)
                ->assertSeeIn("td[field-key='report_time']", $aggregation_server->report_time)
                ->assertSeeIn("td[field-key='report_email']", $aggregation_server->report_email)
                ->assertSeeIn("td[field-key='max_days_channel_history']", $aggregation_server->max_days_channel_history)
                ->assertSeeIn("td[field-key='notification_server_type']", $aggregation_server->notification_server_type->notification_server_type)
                ->assertSeeIn("td[field-key='real_time_notification_url']", $aggregation_server->real_time_notification_url)
                ->assertNotChecked("basic_discovery_enabled")
                ->assertNotChecked("continuous_discovery_enabled")
                ->assertSeeIn("td[field-key='username']", $aggregation_server->username)
                ->assertSeeIn("td[field-key='advanced_username']", $aggregation_server->advanced_username)
                ->assertSeeIn("td[field-key='advanced_password']", $aggregation_server->advanced_password)
                ->assertChecked("millisecond_precision")
                ->assertChecked("show_channel_button")
                ->assertNotChecked("show_clip_button")
                ->assertNotChecked("show_group_button")
                ->assertNotChecked("show_live_button")
                ->assertNotChecked("enable_evt")
                ->assertNotChecked("enable_excel")
                ->assertSeeIn("td[field-key='enable_evt_timing']", $aggregation_server->enable_evt_timing)
                ->assertSeeIn("td[field-key='timezone']", $aggregation_server->timezone->timezone)
                ->assertSeeIn("td[field-key='filter_preset_for_ui']", $aggregation_server->filter_preset_for_ui->name)
                ->assertSeeIn("td[field-key='country']", $aggregation_server->country->title)
                ->assertSeeIn("td[field-key='video_server_type']", $aggregation_server->video_server_type->video_server_type)
                ->assertSeeIn("td[field-key='video_server_url']", $aggregation_server->video_server_url)
                ->assertSeeIn("td[field-key='video_server_redirect']", $aggregation_server->video_server_redirect)
                ->assertSeeIn("td[field-key='video_hls_shift']", $aggregation_server->video_hls_shift)
                ->assertSeeIn("td[field-key='cs_token']", $aggregation_server->cs_token)
                ->logout();
        });
    }
}
