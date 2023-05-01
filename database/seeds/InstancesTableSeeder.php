<?php

use Illuminate\Database\Seeder;

class InstancesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('instances')->delete();
        
        \DB::table('instances')->insert(array (
            0 => 
            array (
                'id' => 1,
                'quantity_to_create' => 1,
                'details' => '["d-gp2-aacs1-1.imovetv.com\\n"]',
                'notes' => '',
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:32:37',
                'updated_at' => '2019-07-12 21:32:41',
                'deleted_at' => NULL,
                'group_id' => 1,
                'role_convention_id' => 3,
                'channel_server_id' => NULL,
                'aggregation_server_id' => NULL,
                'env_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'quantity_to_create' => 1,
                'details' => '["d-gp2-aaas1-1.imovetv.com\\n"]',
                'notes' => '',
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:06',
                'updated_at' => '2019-07-12 21:33:07',
                'deleted_at' => NULL,
                'group_id' => 1,
                'role_convention_id' => 2,
                'channel_server_id' => 1,
                'aggregation_server_id' => NULL,
                'env_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'quantity_to_create' => 25,
                'details' => '["d-gp2-aass1-1.imovetv.com\\n","d-gp2-aass1-2.imovetv.com\\n","d-gp2-aass1-3.imovetv.com\\n","d-gp2-aass1-4.imovetv.com\\n","d-gp2-aass1-5.imovetv.com\\n","d-gp2-aass1-6.imovetv.com\\n","d-gp2-aass1-7.imovetv.com\\n","d-gp2-aass1-8.imovetv.com\\n","d-gp2-aass1-9.imovetv.com\\n","d-gp2-aass1-10.imovetv.com\\n","d-gp2-aass1-11.imovetv.com\\n","d-gp2-aass1-12.imovetv.com\\n","d-gp2-aass1-13.imovetv.com\\n","d-gp2-aass1-14.imovetv.com\\n","d-gp2-aass1-15.imovetv.com\\n","d-gp2-aass1-16.imovetv.com\\n","d-gp2-aass1-17.imovetv.com\\n","d-gp2-aass1-18.imovetv.com\\n","d-gp2-aass1-19.imovetv.com\\n","d-gp2-aass1-20.imovetv.com\\n","d-gp2-aass1-21.imovetv.com\\n","d-gp2-aass1-22.imovetv.com\\n","d-gp2-aass1-23.imovetv.com\\n","d-gp2-aass1-24.imovetv.com\\n","d-gp2-aass1-25.imovetv.com\\n"]',
                'notes' => '',
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:33',
                'updated_at' => '2019-07-12 21:33:36',
                'deleted_at' => NULL,
                'group_id' => 1,
                'role_convention_id' => 1,
                'channel_server_id' => 1,
                'aggregation_server_id' => 1,
                'env_id' => 1,
            ),
        ));
        
        
    }
}