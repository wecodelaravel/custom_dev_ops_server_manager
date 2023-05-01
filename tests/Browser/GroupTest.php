<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class GroupTest extends DuskTestCase
{
    public function testCreateGroup()
    {
        $admin = \App\User::find(1);
        $group = factory('App\Group')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $group) {
            $browser->loginAs($admin)
                ->visit(route('admin.groups.index'))
                ->clickLink('Add new')
                ->type("group", $group->group)
                ->type("cs_token", $group->cs_token)
                ->type("details", $group->details)
                ->press('Save')
                ->assertRouteIs('admin.groups.index')
                ->assertSeeIn("tr:last-child td[field-key='group']", $group->group)
                ->logout();
        });
    }

    public function testEditGroup()
    {
        $admin = \App\User::find(1);
        $group = factory('App\Group')->create();
        $group2 = factory('App\Group')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $group, $group2) {
            $browser->loginAs($admin)
                ->visit(route('admin.groups.index'))
                ->click('tr[data-entry-id="' . $group->id . '"] .btn-info')
                ->type("group", $group2->group)
                ->type("cs_token", $group2->cs_token)
                ->type("details", $group2->details)
                ->press('Update')
                ->assertRouteIs('admin.groups.index')
                ->assertSeeIn("tr:last-child td[field-key='group']", $group2->group)
                ->logout();
        });
    }

    public function testShowGroup()
    {
        $admin = \App\User::find(1);
        $group = factory('App\Group')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $group) {
            $browser->loginAs($admin)
                ->visit(route('admin.groups.index'))
                ->click('tr[data-entry-id="' . $group->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='group']", $group->group)
                ->assertSeeIn("td[field-key='cs_token']", $group->cs_token)
                ->assertSeeIn("td[field-key='details']", $group->details)
                ->logout();
        });
    }
}
