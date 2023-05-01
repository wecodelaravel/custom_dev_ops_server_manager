<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RoleConventionTest extends DuskTestCase
{
    public function testCreateRoleConvention()
    {
        $admin = \App\User::find(1);
        $role_convention = factory('App\RoleConvention')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $role_convention) {
            $browser->loginAs($admin)
                ->visit(route('admin.role_conventions.index'))
                ->clickLink('Add new')
                ->type("role_convention", $role_convention->role_convention)
                ->type("role_convention_value", $role_convention->role_convention_value)
                ->press('Save')
                ->assertRouteIs('admin.role_conventions.index')
                ->assertSeeIn("tr:last-child td[field-key='role_convention']", $role_convention->role_convention)
                ->assertSeeIn("tr:last-child td[field-key='role_convention_value']", $role_convention->role_convention_value)
                ->logout();
        });
    }

    public function testEditRoleConvention()
    {
        $admin = \App\User::find(1);
        $role_convention = factory('App\RoleConvention')->create();
        $role_convention2 = factory('App\RoleConvention')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $role_convention, $role_convention2) {
            $browser->loginAs($admin)
                ->visit(route('admin.role_conventions.index'))
                ->click('tr[data-entry-id="' . $role_convention->id . '"] .btn-info')
                ->type("role_convention", $role_convention2->role_convention)
                ->type("role_convention_value", $role_convention2->role_convention_value)
                ->press('Update')
                ->assertRouteIs('admin.role_conventions.index')
                ->assertSeeIn("tr:last-child td[field-key='role_convention']", $role_convention2->role_convention)
                ->assertSeeIn("tr:last-child td[field-key='role_convention_value']", $role_convention2->role_convention_value)
                ->logout();
        });
    }

    public function testShowRoleConvention()
    {
        $admin = \App\User::find(1);
        $role_convention = factory('App\RoleConvention')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $role_convention) {
            $browser->loginAs($admin)
                ->visit(route('admin.role_conventions.index'))
                ->click('tr[data-entry-id="' . $role_convention->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='role_convention']", $role_convention->role_convention)
                ->assertSeeIn("td[field-key='role_convention_value']", $role_convention->role_convention_value)
                ->logout();
        });
    }
}
