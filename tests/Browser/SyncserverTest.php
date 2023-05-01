<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class SyncserverTest extends DuskTestCase
{
    public function testCreateSyncserver()
    {
        $admin = \App\User::find(1);
        $syncserver = factory('App\Syncserver')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $syncserver) {
            $browser->loginAs($admin)
                ->visit(route('admin.syncservers.index'))
                ->clickLink('Add new')
                ->select("channel_server_id", $syncserver->channel_server_id)
                ->select("parent_as_id", $syncserver->parent_as_id)
                ->type("ss_name", $syncserver->ss_name)
                ->type("ss_host_url", $syncserver->ss_host_url)
                ->type("ss_hostip", $syncserver->ss_hostip)
                ->type("transcoding_server", $syncserver->transcoding_server)
                ->type("max_upload_filesize", $syncserver->max_upload_filesize)
                ->type("report_time", $syncserver->report_time)
                ->type("report_email", $syncserver->report_email)
                ->type("max_days_channel_history", $syncserver->max_days_channel_history)
                ->select("notification_server_type_id", $syncserver->notification_server_type_id)
                ->type("real_time_notification_url", $syncserver->real_time_notification_url)
                ->check("basic_discovery_enabled")
                ->check("continuous_discovery_enabled")
                ->type("username", $syncserver->username)
                ->type("password", $syncserver->password)
                ->type("advanced_username", $syncserver->advanced_username)
                ->type("advanced_password", $syncserver->advanced_password)
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->check("show_clip_button")
                ->check("show_group_button")
                ->check("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->type("enable_evt_timing", $syncserver->enable_evt_timing)
                ->select("timezone_id", $syncserver->timezone_id)
                ->select("filter_preset_for_ui_id", $syncserver->filter_preset_for_ui_id)
                ->select("country_id", $syncserver->country_id)
                ->select("video_server_type_id", $syncserver->video_server_type_id)
                ->type("video_server_url", $syncserver->video_server_url)
                ->type("video_server_redirect", $syncserver->video_server_redirect)
                ->type("video_hls_shift", $syncserver->video_hls_shift)
                ->type("cs_token", $syncserver->cs_token)
                ->press('Save')
                ->assertRouteIs('admin.syncservers.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $syncserver->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='parent_as']", $syncserver->parent_as->as_name)
                ->assertSeeIn("tr:last-child td[field-key='ss_name']", $syncserver->ss_name)
                ->assertSeeIn("tr:last-child td[field-key='ss_host_url']", $syncserver->ss_host_url)
                ->assertSeeIn("tr:last-child td[field-key='ss_hostip']", $syncserver->ss_hostip)
                ->logout();
        });
    }

    public function testEditSyncserver()
    {
        $admin = \App\User::find(1);
        $syncserver = factory('App\Syncserver')->create();
        $syncserver2 = factory('App\Syncserver')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $syncserver, $syncserver2) {
            $browser->loginAs($admin)
                ->visit(route('admin.syncservers.index'))
                ->click('tr[data-entry-id="' . $syncserver->id . '"] .btn-info')
                ->select("channel_server_id", $syncserver2->channel_server_id)
                ->select("parent_as_id", $syncserver2->parent_as_id)
                ->type("ss_name", $syncserver2->ss_name)
                ->type("ss_host_url", $syncserver2->ss_host_url)
                ->type("ss_hostip", $syncserver2->ss_hostip)
                ->type("transcoding_server", $syncserver2->transcoding_server)
                ->type("max_upload_filesize", $syncserver2->max_upload_filesize)
                ->type("report_time", $syncserver2->report_time)
                ->type("report_email", $syncserver2->report_email)
                ->type("max_days_channel_history", $syncserver2->max_days_channel_history)
                ->select("notification_server_type_id", $syncserver2->notification_server_type_id)
                ->type("real_time_notification_url", $syncserver2->real_time_notification_url)
                ->check("basic_discovery_enabled")
                ->check("continuous_discovery_enabled")
                ->type("username", $syncserver2->username)
                ->type("password", $syncserver2->password)
                ->type("advanced_username", $syncserver2->advanced_username)
                ->type("advanced_password", $syncserver2->advanced_password)
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->check("show_clip_button")
                ->check("show_group_button")
                ->check("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->type("enable_evt_timing", $syncserver2->enable_evt_timing)
                ->select("timezone_id", $syncserver2->timezone_id)
                ->select("filter_preset_for_ui_id", $syncserver2->filter_preset_for_ui_id)
                ->select("country_id", $syncserver2->country_id)
                ->select("video_server_type_id", $syncserver2->video_server_type_id)
                ->type("video_server_url", $syncserver2->video_server_url)
                ->type("video_server_redirect", $syncserver2->video_server_redirect)
                ->type("video_hls_shift", $syncserver2->video_hls_shift)
                ->type("cs_token", $syncserver2->cs_token)
                ->press('Update')
                ->assertRouteIs('admin.syncservers.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $syncserver2->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='parent_as']", $syncserver2->parent_as->as_name)
                ->assertSeeIn("tr:last-child td[field-key='ss_name']", $syncserver2->ss_name)
                ->assertSeeIn("tr:last-child td[field-key='ss_host_url']", $syncserver2->ss_host_url)
                ->assertSeeIn("tr:last-child td[field-key='ss_hostip']", $syncserver2->ss_hostip)
                ->logout();
        });
    }

    public function testShowSyncserver()
    {
        $admin = \App\User::find(1);
        $syncserver = factory('App\Syncserver')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $syncserver) {
            $browser->loginAs($admin)
                ->visit(route('admin.syncservers.index'))
                ->click('tr[data-entry-id="' . $syncserver->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_server']", $syncserver->channel_server->cs_host)
                ->assertSeeIn("td[field-key='parent_as']", $syncserver->parent_as->as_name)
                ->assertSeeIn("td[field-key='ss_name']", $syncserver->ss_name)
                ->assertSeeIn("td[field-key='ss_host_url']", $syncserver->ss_host_url)
                ->assertSeeIn("td[field-key='ss_hostip']", $syncserver->ss_hostip)
                ->assertSeeIn("td[field-key='transcoding_server']", $syncserver->transcoding_server)
                ->assertSeeIn("td[field-key='max_upload_filesize']", $syncserver->max_upload_filesize)
                ->assertSeeIn("td[field-key='report_time']", $syncserver->report_time)
                ->assertSeeIn("td[field-key='report_email']", $syncserver->report_email)
                ->assertSeeIn("td[field-key='max_days_channel_history']", $syncserver->max_days_channel_history)
                ->assertSeeIn("td[field-key='notification_server_type']", $syncserver->notification_server_type->notification_server_type)
                ->assertSeeIn("td[field-key='real_time_notification_url']", $syncserver->real_time_notification_url)
                ->assertNotChecked("basic_discovery_enabled")
                ->assertNotChecked("continuous_discovery_enabled")
                ->assertSeeIn("td[field-key='username']", $syncserver->username)
                ->assertSeeIn("td[field-key='advanced_username']", $syncserver->advanced_username)
                ->assertSeeIn("td[field-key='advanced_password']", $syncserver->advanced_password)
                ->assertChecked("millisecond_precision")
                ->assertChecked("show_channel_button")
                ->assertNotChecked("show_clip_button")
                ->assertNotChecked("show_group_button")
                ->assertNotChecked("show_live_button")
                ->assertNotChecked("enable_evt")
                ->assertNotChecked("enable_excel")
                ->assertSeeIn("td[field-key='enable_evt_timing']", $syncserver->enable_evt_timing)
                ->assertSeeIn("td[field-key='timezone']", $syncserver->timezone->timezone)
                ->assertSeeIn("td[field-key='filter_preset_for_ui']", $syncserver->filter_preset_for_ui->name)
                ->assertSeeIn("td[field-key='country']", $syncserver->country->title)
                ->assertSeeIn("td[field-key='video_server_type']", $syncserver->video_server_type->video_server_type)
                ->assertSeeIn("td[field-key='video_server_url']", $syncserver->video_server_url)
                ->assertSeeIn("td[field-key='video_server_redirect']", $syncserver->video_server_redirect)
                ->assertSeeIn("td[field-key='video_hls_shift']", $syncserver->video_hls_shift)
                ->assertSeeIn("td[field-key='cs_token']", $syncserver->cs_token)
                ->logout();
        });
    }
}
