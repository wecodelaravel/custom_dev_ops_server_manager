<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class EnvironmentTest extends DuskTestCase
{
    public function testCreateEnvironment()
    {
        $admin = \App\User::find(1);
        $environment = factory('App\Environment')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $environment) {
            $browser->loginAs($admin)
                ->visit(route('admin.environments.index'))
                ->clickLink('Add new')
                ->type("environment", $environment->environment)
                ->type("env_value", $environment->env_value)
                ->press('Save')
                ->assertRouteIs('admin.environments.index')
                ->assertSeeIn("tr:last-child td[field-key='environment']", $environment->environment)
                ->assertSeeIn("tr:last-child td[field-key='env_value']", $environment->env_value)
                ->logout();
        });
    }

    public function testEditEnvironment()
    {
        $admin = \App\User::find(1);
        $environment = factory('App\Environment')->create();
        $environment2 = factory('App\Environment')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $environment, $environment2) {
            $browser->loginAs($admin)
                ->visit(route('admin.environments.index'))
                ->click('tr[data-entry-id="' . $environment->id . '"] .btn-info')
                ->type("environment", $environment2->environment)
                ->type("env_value", $environment2->env_value)
                ->press('Update')
                ->assertRouteIs('admin.environments.index')
                ->assertSeeIn("tr:last-child td[field-key='environment']", $environment2->environment)
                ->assertSeeIn("tr:last-child td[field-key='env_value']", $environment2->env_value)
                ->logout();
        });
    }

    public function testShowEnvironment()
    {
        $admin = \App\User::find(1);
        $environment = factory('App\Environment')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $environment) {
            $browser->loginAs($admin)
                ->visit(route('admin.environments.index'))
                ->click('tr[data-entry-id="' . $environment->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='environment']", $environment->environment)
                ->assertSeeIn("td[field-key='env_value']", $environment->env_value)
                ->logout();
        });
    }
}
