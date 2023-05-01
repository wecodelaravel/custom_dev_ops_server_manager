<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class AggregationTest extends DuskTestCase
{
    public function testCreateAggregation()
    {
        $admin = \App\User::find(1);
        $aggregation = factory('App\Aggregation')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $aggregation) {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregations.index'))
                ->clickLink('Add new')
                ->select("channel_server_id", $aggregation->channel_server_id)
                ->type("as_name", $aggregation->as_name)
                ->type("as_host_url", $aggregation->as_host_url)
                ->type("as_hostip", $aggregation->as_hostip)
                ->type("transcoding_server", $aggregation->transcoding_server)
                ->type("max_upload_filesize", $aggregation->max_upload_filesize)
                ->type("report_time", $aggregation->report_time)
                ->type("report_email", $aggregation->report_email)
                ->type("max_days_channel_history", $aggregation->max_days_channel_history)
                ->select("notification_server_type_id", $aggregation->notification_server_type_id)
                ->type("real_time_notification_url", $aggregation->real_time_notification_url)
                ->check("basic_discovery_enabled")
                ->check("continuous_discovery_enabled")
                ->type("username", $aggregation->username)
                ->type("password", $aggregation->password)
                ->type("advanced_username", $aggregation->advanced_username)
                ->type("advanced_password", $aggregation->advanced_password)
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->check("show_clip_button")
                ->check("show_group_button")
                ->check("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->type("enable_evt_timing", $aggregation->enable_evt_timing)
                ->select("timezone_id", $aggregation->timezone_id)
                ->select("filter_preset_for_ui_id", $aggregation->filter_preset_for_ui_id)
                ->select("country_id", $aggregation->country_id)
                ->select("video_server_type_id", $aggregation->video_server_type_id)
                ->type("video_server_url", $aggregation->video_server_url)
                ->type("video_server_redirect", $aggregation->video_server_redirect)
                ->type("video_hls_shift", $aggregation->video_hls_shift)
                ->type("cs_token", $aggregation->cs_token)
                ->press('Save')
                ->assertRouteIs('admin.aggregations.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $aggregation->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='as_name']", $aggregation->as_name)
                ->assertSeeIn("tr:last-child td[field-key='as_host_url']", $aggregation->as_host_url)
                ->assertSeeIn("tr:last-child td[field-key='as_hostip']", $aggregation->as_hostip)
                ->logout();
        });
    }

    public function testEditAggregation()
    {
        $admin = \App\User::find(1);
        $aggregation = factory('App\Aggregation')->create();
        $aggregation2 = factory('App\Aggregation')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $aggregation, $aggregation2) {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregations.index'))
                ->click('tr[data-entry-id="' . $aggregation->id . '"] .btn-info')
                ->select("channel_server_id", $aggregation2->channel_server_id)
                ->type("as_name", $aggregation2->as_name)
                ->type("as_host_url", $aggregation2->as_host_url)
                ->type("as_hostip", $aggregation2->as_hostip)
                ->type("transcoding_server", $aggregation2->transcoding_server)
                ->type("max_upload_filesize", $aggregation2->max_upload_filesize)
                ->type("report_time", $aggregation2->report_time)
                ->type("report_email", $aggregation2->report_email)
                ->type("max_days_channel_history", $aggregation2->max_days_channel_history)
                ->select("notification_server_type_id", $aggregation2->notification_server_type_id)
                ->type("real_time_notification_url", $aggregation2->real_time_notification_url)
                ->check("basic_discovery_enabled")
                ->check("continuous_discovery_enabled")
                ->type("username", $aggregation2->username)
                ->type("password", $aggregation2->password)
                ->type("advanced_username", $aggregation2->advanced_username)
                ->type("advanced_password", $aggregation2->advanced_password)
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->check("show_clip_button")
                ->check("show_group_button")
                ->check("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->type("enable_evt_timing", $aggregation2->enable_evt_timing)
                ->select("timezone_id", $aggregation2->timezone_id)
                ->select("filter_preset_for_ui_id", $aggregation2->filter_preset_for_ui_id)
                ->select("country_id", $aggregation2->country_id)
                ->select("video_server_type_id", $aggregation2->video_server_type_id)
                ->type("video_server_url", $aggregation2->video_server_url)
                ->type("video_server_redirect", $aggregation2->video_server_redirect)
                ->type("video_hls_shift", $aggregation2->video_hls_shift)
                ->type("cs_token", $aggregation2->cs_token)
                ->press('Update')
                ->assertRouteIs('admin.aggregations.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $aggregation2->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='as_name']", $aggregation2->as_name)
                ->assertSeeIn("tr:last-child td[field-key='as_host_url']", $aggregation2->as_host_url)
                ->assertSeeIn("tr:last-child td[field-key='as_hostip']", $aggregation2->as_hostip)
                ->logout();
        });
    }

    public function testShowAggregation()
    {
        $admin = \App\User::find(1);
        $aggregation = factory('App\Aggregation')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $aggregation) {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregations.index'))
                ->click('tr[data-entry-id="' . $aggregation->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_server']", $aggregation->channel_server->cs_host)
                ->assertSeeIn("td[field-key='as_name']", $aggregation->as_name)
                ->assertSeeIn("td[field-key='as_host_url']", $aggregation->as_host_url)
                ->assertSeeIn("td[field-key='as_hostip']", $aggregation->as_hostip)
                ->assertSeeIn("td[field-key='transcoding_server']", $aggregation->transcoding_server)
                ->assertSeeIn("td[field-key='max_upload_filesize']", $aggregation->max_upload_filesize)
                ->assertSeeIn("td[field-key='report_time']", $aggregation->report_time)
                ->assertSeeIn("td[field-key='report_email']", $aggregation->report_email)
                ->assertSeeIn("td[field-key='max_days_channel_history']", $aggregation->max_days_channel_history)
                ->assertSeeIn("td[field-key='notification_server_type']", $aggregation->notification_server_type->notification_server_type)
                ->assertSeeIn("td[field-key='real_time_notification_url']", $aggregation->real_time_notification_url)
                ->assertNotChecked("basic_discovery_enabled")
                ->assertNotChecked("continuous_discovery_enabled")
                ->assertSeeIn("td[field-key='username']", $aggregation->username)
                ->assertSeeIn("td[field-key='advanced_username']", $aggregation->advanced_username)
                ->assertSeeIn("td[field-key='advanced_password']", $aggregation->advanced_password)
                ->assertChecked("millisecond_precision")
                ->assertChecked("show_channel_button")
                ->assertNotChecked("show_clip_button")
                ->assertNotChecked("show_group_button")
                ->assertNotChecked("show_live_button")
                ->assertNotChecked("enable_evt")
                ->assertNotChecked("enable_excel")
                ->assertSeeIn("td[field-key='enable_evt_timing']", $aggregation->enable_evt_timing)
                ->assertSeeIn("td[field-key='timezone']", $aggregation->timezone->timezone)
                ->assertSeeIn("td[field-key='filter_preset_for_ui']", $aggregation->filter_preset_for_ui->name)
                ->assertSeeIn("td[field-key='country']", $aggregation->country->title)
                ->assertSeeIn("td[field-key='video_server_type']", $aggregation->video_server_type->video_server_type)
                ->assertSeeIn("td[field-key='video_server_url']", $aggregation->video_server_url)
                ->assertSeeIn("td[field-key='video_server_redirect']", $aggregation->video_server_redirect)
                ->assertSeeIn("td[field-key='video_hls_shift']", $aggregation->video_hls_shift)
                ->assertSeeIn("td[field-key='cs_token']", $aggregation->cs_token)
                ->logout();
        });
    }
}
