<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class InstanceTest extends DuskTestCase
{
    public function testCreateInstance()
    {
        $admin = \App\User::find(1);
        $instance = factory('App\Instance')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $instance) {
            $browser->loginAs($admin)
                ->visit(route('admin.instances.index'))
                ->clickLink('Add new')
                ->type("quantity_to_create", $instance->quantity_to_create)
                ->select("group_id", $instance->group_id)
                ->select("role_convention_id", $instance->role_convention_id)
                ->select("env_id", $instance->env_id)
                ->type("details", $instance->details)
                ->type("notes", $instance->notes)
                ->type("cs_token", $instance->cs_token)
                ->press('Save')
                ->assertRouteIs('admin.instances.index')
                ->assertSeeIn("tr:last-child td[field-key='quantity_to_create']", $instance->quantity_to_create)
                ->assertSeeIn("tr:last-child td[field-key='group']", $instance->group->group)
                ->assertSeeIn("tr:last-child td[field-key='role_convention']", $instance->role_convention->role_convention)
                ->assertSeeIn("tr:last-child td[field-key='env']", $instance->env->environment)
                ->logout();
        });
    }

    public function testEditInstance()
    {
        $admin = \App\User::find(1);
        $instance = factory('App\Instance')->create();
        $instance2 = factory('App\Instance')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $instance, $instance2) {
            $browser->loginAs($admin)
                ->visit(route('admin.instances.index'))
                ->click('tr[data-entry-id="' . $instance->id . '"] .btn-info')
                ->type("quantity_to_create", $instance2->quantity_to_create)
                ->select("group_id", $instance2->group_id)
                ->select("role_convention_id", $instance2->role_convention_id)
                ->select("env_id", $instance2->env_id)
                ->type("details", $instance2->details)
                ->type("notes", $instance2->notes)
                ->type("cs_token", $instance2->cs_token)
                ->press('Update')
                ->assertRouteIs('admin.instances.index')
                ->assertSeeIn("tr:last-child td[field-key='quantity_to_create']", $instance2->quantity_to_create)
                ->assertSeeIn("tr:last-child td[field-key='group']", $instance2->group->group)
                ->assertSeeIn("tr:last-child td[field-key='role_convention']", $instance2->role_convention->role_convention)
                ->assertSeeIn("tr:last-child td[field-key='env']", $instance2->env->environment)
                ->logout();
        });
    }

    public function testShowInstance()
    {
        $admin = \App\User::find(1);
        $instance = factory('App\Instance')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $instance) {
            $browser->loginAs($admin)
                ->visit(route('admin.instances.index'))
                ->click('tr[data-entry-id="' . $instance->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='quantity_to_create']", $instance->quantity_to_create)
                ->assertSeeIn("td[field-key='group']", $instance->group->group)
                ->assertSeeIn("td[field-key='role_convention']", $instance->role_convention->role_convention)
                ->assertSeeIn("td[field-key='env']", $instance->env->environment)
                ->assertSeeIn("td[field-key='details']", $instance->details)
                ->assertSeeIn("td[field-key='notes']", $instance->notes)
                ->assertSeeIn("td[field-key='cs_token']", $instance->cs_token)
                ->logout();
        });
    }
}
