<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('groups')->delete();
        
        \DB::table('groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group' => 1,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'details' => NULL,
                'notes' => '',
                'created_at' => '2019-06-06 20:53:31',
                'updated_at' => '2019-06-06 20:53:31',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'group' => 2,
                'cs_token' => '9c45c2f1-1761-3daa-ad31-1ff8703ae846',
                'details' => NULL,
                'notes' => '',
                'created_at' => '2019-06-25 20:31:50',
                'updated_at' => '2019-06-25 20:31:50',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}