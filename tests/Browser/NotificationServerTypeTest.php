<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class NotificationServerTypeTest extends DuskTestCase
{
    public function testCreateNotificationServerType()
    {
        $admin = \App\User::find(1);
        $notification_server_type = factory('App\NotificationServerType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $notification_server_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.notification_server_types.index'))
                ->clickLink('Add new')
                ->type("notification_server_type", $notification_server_type->notification_server_type)
                ->press('Save')
                ->assertRouteIs('admin.notification_server_types.index')
                ->assertSeeIn("tr:last-child td[field-key='notification_server_type']", $notification_server_type->notification_server_type)
                ->logout();
        });
    }

    public function testEditNotificationServerType()
    {
        $admin = \App\User::find(1);
        $notification_server_type = factory('App\NotificationServerType')->create();
        $notification_server_type2 = factory('App\NotificationServerType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $notification_server_type, $notification_server_type2) {
            $browser->loginAs($admin)
                ->visit(route('admin.notification_server_types.index'))
                ->click('tr[data-entry-id="' . $notification_server_type->id . '"] .btn-info')
                ->type("notification_server_type", $notification_server_type2->notification_server_type)
                ->press('Update')
                ->assertRouteIs('admin.notification_server_types.index')
                ->assertSeeIn("tr:last-child td[field-key='notification_server_type']", $notification_server_type2->notification_server_type)
                ->logout();
        });
    }

    public function testShowNotificationServerType()
    {
        $admin = \App\User::find(1);
        $notification_server_type = factory('App\NotificationServerType')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $notification_server_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.notification_server_types.index'))
                ->click('tr[data-entry-id="' . $notification_server_type->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='notification_server_type']", $notification_server_type->notification_server_type)
                ->logout();
        });
    }
}
