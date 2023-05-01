<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ChannelServerTest extends DuskTestCase
{
    public function testCreateChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->clickLink('Add new')
                ->type("cs_name", $channel_server->cs_name)
                ->type("cs_host", $channel_server->cs_host)
                ->type("cs_host_ip", $channel_server->cs_host_ip)
                ->type("cs_token", $channel_server->cs_token)
                ->type("notes", $channel_server->notes)
                ->press('Save')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='cs_name']", $channel_server->cs_name)
                ->assertSeeIn("tr:last-child td[field-key='cs_host']", $channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='cs_host_ip']", $channel_server->cs_host_ip)
                ->logout();
        });
    }

    public function testEditChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();
        $channel_server2 = factory('App\ChannelServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel_server, $channel_server2) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-info')
                ->type("cs_name", $channel_server2->cs_name)
                ->type("cs_host", $channel_server2->cs_host)
                ->type("cs_host_ip", $channel_server2->cs_host_ip)
                ->type("cs_token", $channel_server2->cs_token)
                ->type("notes", $channel_server2->notes)
                ->press('Update')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='cs_name']", $channel_server2->cs_name)
                ->assertSeeIn("tr:last-child td[field-key='cs_host']", $channel_server2->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='cs_host_ip']", $channel_server2->cs_host_ip)
                ->logout();
        });
    }

    public function testShowChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $channel_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='cs_name']", $channel_server->cs_name)
                ->assertSeeIn("td[field-key='cs_host']", $channel_server->cs_host)
                ->assertSeeIn("td[field-key='cs_host_ip']", $channel_server->cs_host_ip)
                ->assertSeeIn("td[field-key='cs_token']", $channel_server->cs_token)
                ->assertSeeIn("td[field-key='notes']", $channel_server->notes)
                ->logout();
        });
    }
}
