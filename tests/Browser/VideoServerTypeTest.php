<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class VideoServerTypeTest extends DuskTestCase
{
    public function testCreateVideoServerType()
    {
        $admin = \App\User::find(1);
        $video_server_type = factory('App\VideoServerType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $video_server_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.video_server_types.index'))
                ->clickLink('Add new')
                ->type("video_server_type", $video_server_type->video_server_type)
                ->press('Save')
                ->assertRouteIs('admin.video_server_types.index')
                ->assertSeeIn("tr:last-child td[field-key='video_server_type']", $video_server_type->video_server_type)
                ->logout();
        });
    }

    public function testEditVideoServerType()
    {
        $admin = \App\User::find(1);
        $video_server_type = factory('App\VideoServerType')->create();
        $video_server_type2 = factory('App\VideoServerType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $video_server_type, $video_server_type2) {
            $browser->loginAs($admin)
                ->visit(route('admin.video_server_types.index'))
                ->click('tr[data-entry-id="' . $video_server_type->id . '"] .btn-info')
                ->type("video_server_type", $video_server_type2->video_server_type)
                ->press('Update')
                ->assertRouteIs('admin.video_server_types.index')
                ->assertSeeIn("tr:last-child td[field-key='video_server_type']", $video_server_type2->video_server_type)
                ->logout();
        });
    }

    public function testShowVideoServerType()
    {
        $admin = \App\User::find(1);
        $video_server_type = factory('App\VideoServerType')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $video_server_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.video_server_types.index'))
                ->click('tr[data-entry-id="' . $video_server_type->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='video_server_type']", $video_server_type->video_server_type)
                ->logout();
        });
    }
}
