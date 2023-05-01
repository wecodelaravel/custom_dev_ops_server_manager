<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CsiTest extends DuskTestCase
{
    public function testCreateCsi()
    {
        $admin = \App\User::find(1);
        $csi = factory('App\Csi')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $csi) {
            $browser->loginAs($admin)
                ->visit(route('admin.csis.index'))
                ->clickLink('Add new')
                ->select("channel_server_id", $csi->channel_server_id)
                ->select("channel_id", $csi->channel_id)
                ->select("protocol_id", $csi->protocol_id)
                ->type("move_path", $csi->move_path)
                ->type("cs_token", $csi->cs_token)
                ->press('Save')
                ->assertRouteIs('admin.csis.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $csi->channel_server->cs_name)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $csi->channel->source_name)
                ->assertSeeIn("tr:last-child td[field-key='protocol']", $csi->protocol->protocol)
                ->assertSeeIn("tr:last-child td[field-key='move_path']", $csi->move_path)
                ->logout();
        });
    }

    public function testEditCsi()
    {
        $admin = \App\User::find(1);
        $csi = factory('App\Csi')->create();
        $csi2 = factory('App\Csi')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $csi, $csi2) {
            $browser->loginAs($admin)
                ->visit(route('admin.csis.index'))
                ->click('tr[data-entry-id="' . $csi->id . '"] .btn-info')
                ->select("channel_server_id", $csi2->channel_server_id)
                ->select("channel_id", $csi2->channel_id)
                ->select("protocol_id", $csi2->protocol_id)
                ->type("move_path", $csi2->move_path)
                ->type("cs_token", $csi2->cs_token)
                ->press('Update')
                ->assertRouteIs('admin.csis.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $csi2->channel_server->cs_name)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $csi2->channel->source_name)
                ->assertSeeIn("tr:last-child td[field-key='protocol']", $csi2->protocol->protocol)
                ->assertSeeIn("tr:last-child td[field-key='move_path']", $csi2->move_path)
                ->logout();
        });
    }

    public function testShowCsi()
    {
        $admin = \App\User::find(1);
        $csi = factory('App\Csi')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $csi) {
            $browser->loginAs($admin)
                ->visit(route('admin.csis.index'))
                ->click('tr[data-entry-id="' . $csi->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_server']", $csi->channel_server->cs_name)
                ->assertSeeIn("td[field-key='channel']", $csi->channel->source_name)
                ->assertSeeIn("td[field-key='protocol']", $csi->protocol->protocol)
                ->assertSeeIn("td[field-key='move_path']", $csi->move_path)
                ->assertSeeIn("td[field-key='cs_token']", $csi->cs_token)
                ->logout();
        });
    }
}
