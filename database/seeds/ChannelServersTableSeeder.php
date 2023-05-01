<?php

use Illuminate\Database\Seeder;

class ChannelServersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('channel_servers')->delete();
        
        \DB::table('channel_servers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cs_name' => 'd-gp2-aacs1-1',
                'cs_host' => 'd-gp2-aacs1-1.imovetv.com',
                'cs_host_ip' => NULL,
                'cs_token' => '94e4f1d7-f23d-3cc0-a5d1-82545680f178',
                'notes' => NULL,
                'username' => NULL,
                'password' => NULL,
                'default_cloud_a_address' => NULL,
                'default_cloud_a_port' => NULL,
                'default_cloud_b_address' => NULL,
                'default_cloud_b_port' => NULL,
                'local_output' => NULL,
                'local_output_port' => NULL,
                'license' => 'LIC=ChannelServer-AA-1.0-20991231-20190712-DISHCS!D-GP2-AACS1-1!00000000000000000000000000',
                'created_at' => '2019-07-12 21:32:38',
                'updated_at' => '2019-07-12 21:32:38',
                'deleted_at' => NULL,
                'group_id' => 1,
                'host_id' => 1,
            ),
        ));
        
        
    }
}