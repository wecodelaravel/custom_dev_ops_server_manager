<?php

use Illuminate\Database\Seeder;

class SyncServerFunctionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sync_server_functions')->delete();
        
        \DB::table('sync_server_functions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'RECORDING',
                'description' => 'Only recording function is turned on',
                'created_at' => '2019-06-21 21:29:10',
                'updated_at' => '2019-06-21 21:38:12',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'DETECTION',
                'description' => 'Matching and Recording turned on',
                'created_at' => '2019-06-21 21:29:59',
                'updated_at' => '2019-06-21 21:29:59',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'DISCOVERY',
                'description' => 'Checking new sources for possible ads',
                'created_at' => '2019-06-21 21:30:41',
                'updated_at' => '2019-06-21 21:37:40',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'NOTIFICATIONS',
                'description' => 'Notifications are turned on to notify when something is found in discovery',
                'created_at' => '2019-06-21 21:37:09',
                'updated_at' => '2019-06-21 21:37:09',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}