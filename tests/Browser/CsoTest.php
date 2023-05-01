<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CsoTest extends DuskTestCase
{

    public function testCreateCso()
    {
        $admin = \App\User::find(1);
        $cso = factory('App\Cso')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $cso) {
            $browser->loginAs($admin)
                ->visit(route('admin.csos.index'))
                ->clickLink('Add new')
                ->check("use_channel_server_localhost")
                ->select("channel_server_id", $cso->channel_server_id)
                ->select("channel_server_input_source_id", $cso->channel_server_input_source_id)
                ->check("use_as_for_a")
                ->select("select_aggregation_server_for_a_id", $cso->select_aggregation_server_for_a_id)
                ->check("use_sync_server_for_a")
                ->select("select_sync_server_for_a_id", $cso->select_sync_server_for_a_id)
                ->check("use_custom_a")
                ->type("ocloud_a", $cso->ocloud_a)
                ->type("ocp_a", $cso->ocp_a)
                ->check("use_as_for_b")
                ->select("select_aggregation_server_for_b_id", $cso->select_aggregation_server_for_b_id)
                ->check("use_sync_sever_for_b")
                ->select("select_sync_server_for_b_id", $cso->select_sync_server_for_b_id)
                ->check("use_custom_for_b")
                ->type("ocloud_b", $cso->ocloud_b)
                ->type("ocp_b", $cso->ocp_b)
                ->select("channel_id", $cso->channel_id)
                ->press('Save')
                ->assertRouteIs('admin.csos.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $cso->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='channel_server_input_source']", $cso->channel_server_input_source->move_path)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $cso->channel->source_name)
                ->logout();
        });
    }

    public function testEditCso()
    {
        $admin = \App\User::find(1);
        $cso = factory('App\Cso')->create();
        $cso2 = factory('App\Cso')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $cso, $cso2) {
            $browser->loginAs($admin)
                ->visit(route('admin.csos.index'))
                ->click('tr[data-entry-id="' . $cso->id . '"] .btn-info')
                ->check("use_channel_server_localhost")
                ->select("channel_server_id", $cso2->channel_server_id)
                ->select("channel_server_input_source_id", $cso2->channel_server_input_source_id)
                ->check("use_as_for_a")
                ->select("select_aggregation_server_for_a_id", $cso2->select_aggregation_server_for_a_id)
                ->check("use_sync_server_for_a")
                ->select("select_sync_server_for_a_id", $cso2->select_sync_server_for_a_id)
                ->check("use_custom_a")
                ->type("ocloud_a", $cso2->ocloud_a)
                ->type("ocp_a", $cso2->ocp_a)
                ->check("use_as_for_b")
                ->select("select_aggregation_server_for_b_id", $cso2->select_aggregation_server_for_b_id)
                ->check("use_sync_sever_for_b")
                ->select("select_sync_server_for_b_id", $cso2->select_sync_server_for_b_id)
                ->check("use_custom_for_b")
                ->type("ocloud_b", $cso2->ocloud_b)
                ->type("ocp_b", $cso2->ocp_b)
                ->select("channel_id", $cso2->channel_id)
                ->press('Update')
                ->assertRouteIs('admin.csos.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $cso2->channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='channel_server_input_source']", $cso2->channel_server_input_source->move_path)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $cso2->channel->source_name)
                ->logout();
        });
    }

    public function testShowCso()
    {
        $admin = \App\User::find(1);
        $cso = factory('App\Cso')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $cso) {
            $browser->loginAs($admin)
                ->visit(route('admin.csos.index'))
                ->click('tr[data-entry-id="' . $cso->id . '"] .btn-primary')
                ->assertNotChecked("use_channel_server_localhost")
                ->assertSeeIn("td[field-key='channel_server']", $cso->channel_server->cs_host)
                ->assertSeeIn("td[field-key='channel_server_input_source']", $cso->channel_server_input_source->move_path)
                ->assertNotChecked("use_as_for_a")
                ->assertSeeIn("td[field-key='select_aggregation_server_for_a']", $cso->select_aggregation_server_for_a->as_host_url)
                ->assertNotChecked("use_sync_server_for_a")
                ->assertSeeIn("td[field-key='select_sync_server_for_a']", $cso->select_sync_server_for_a->ss_name)
                ->assertNotChecked("use_custom_a")
                ->assertSeeIn("td[field-key='ocloud_a']", $cso->ocloud_a)
                ->assertSeeIn("td[field-key='ocp_a']", $cso->ocp_a)
                ->assertNotChecked("use_as_for_b")
                ->assertSeeIn("td[field-key='select_aggregation_server_for_b']", $cso->select_aggregation_server_for_b->as_host_url)
                ->assertNotChecked("use_sync_sever_for_b")
                ->assertSeeIn("td[field-key='select_sync_server_for_b']", $cso->select_sync_server_for_b->ss_name)
                ->assertNotChecked("use_custom_for_b")
                ->assertSeeIn("td[field-key='ocloud_b']", $cso->ocloud_b)
                ->assertSeeIn("td[field-key='ocp_b']", $cso->ocp_b)
                ->assertSeeIn("td[field-key='channel']", $cso->channel->source_name)
                ->logout();
        });
    }

}
