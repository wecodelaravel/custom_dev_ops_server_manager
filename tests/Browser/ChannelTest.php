<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ChannelTest extends DuskTestCase
{
    public function testCreateChannel()
    {
        $admin = \App\User::find(1);
        $channel = factory('App\Channel')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel) {
            $browser->loginAs($admin)
                ->visit(route('admin.channels.index'))
                ->clickLink('Add new')
                ->type("source_name", $channel->source_name)
                ->type("channelid", $channel->channelid)
                ->type("env", $channel->env)
                ->type("ffmpegsource", $channel->ffmpegsource)
                ->type("ssm", $channel->ssm)
                ->type("imc", $channel->imc)
                ->type("port", $channel->port)
                ->type("pid", $channel->pid)
                ->type("source_ip", $channel->source_ip)
                ->type("udp", $channel->udp)
                ->type("valid_as_of", $channel->valid_as_of)
                ->press('Save')
                ->assertRouteIs('admin.channels.index')
                ->assertSeeIn("tr:last-child td[field-key='channelid']", $channel->channelid)
                ->assertSeeIn("tr:last-child td[field-key='ssm']", $channel->ssm)
                ->assertSeeIn("tr:last-child td[field-key='imc']", $channel->imc)
                ->assertSeeIn("tr:last-child td[field-key='port']", $channel->port)
                ->assertSeeIn("tr:last-child td[field-key='valid_as_of']", $channel->valid_as_of)
                ->logout();
        });
    }

    public function testEditChannel()
    {
        $admin = \App\User::find(1);
        $channel = factory('App\Channel')->create();
        $channel2 = factory('App\Channel')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel, $channel2) {
            $browser->loginAs($admin)
                ->visit(route('admin.channels.index'))
                ->click('tr[data-entry-id="' . $channel->id . '"] .btn-info')
                ->type("source_name", $channel2->source_name)
                ->type("channelid", $channel2->channelid)
                ->type("env", $channel2->env)
                ->type("ffmpegsource", $channel2->ffmpegsource)
                ->type("ssm", $channel2->ssm)
                ->type("imc", $channel2->imc)
                ->type("port", $channel2->port)
                ->type("pid", $channel2->pid)
                ->type("source_ip", $channel2->source_ip)
                ->type("udp", $channel2->udp)
                ->type("valid_as_of", $channel2->valid_as_of)
                ->press('Update')
                ->assertRouteIs('admin.channels.index')
                ->assertSeeIn("tr:last-child td[field-key='channelid']", $channel2->channelid)
                ->assertSeeIn("tr:last-child td[field-key='ssm']", $channel2->ssm)
                ->assertSeeIn("tr:last-child td[field-key='imc']", $channel2->imc)
                ->assertSeeIn("tr:last-child td[field-key='port']", $channel2->port)
                ->assertSeeIn("tr:last-child td[field-key='valid_as_of']", $channel2->valid_as_of)
                ->logout();
        });
    }

    public function testShowChannel()
    {
        $admin = \App\User::find(1);
        $channel = factory('App\Channel')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $channel) {
            $browser->loginAs($admin)
                ->visit(route('admin.channels.index'))
                ->click('tr[data-entry-id="' . $channel->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='source_name']", $channel->source_name)
                ->assertSeeIn("td[field-key='channelid']", $channel->channelid)
                ->assertSeeIn("td[field-key='env']", $channel->env)
                ->assertSeeIn("td[field-key='ffmpegsource']", $channel->ffmpegsource)
                ->assertSeeIn("td[field-key='ssm']", $channel->ssm)
                ->assertSeeIn("td[field-key='imc']", $channel->imc)
                ->assertSeeIn("td[field-key='port']", $channel->port)
                ->assertSeeIn("td[field-key='pid']", $channel->pid)
                ->assertSeeIn("td[field-key='source_ip']", $channel->source_ip)
                ->assertSeeIn("td[field-key='udp']", $channel->udp)
                ->assertSeeIn("td[field-key='valid_as_of']", $channel->valid_as_of)
                ->logout();
        });
    }
}
