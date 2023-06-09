<?php

use Illuminate\Database\Seeder;

class HostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hosts')->delete();
        
        \DB::table('hosts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'd-gp2-aacs1-1',
                'host' => 'd-gp2-aacs1-1.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:32:38',
                'updated_at' => '2019-07-12 21:32:38',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 3,
                'ss_func_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'd-gp2-aaas1-1',
                'host' => 'd-gp2-aaas1-1.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:07',
                'updated_at' => '2019-07-12 21:33:07',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 2,
                'ss_func_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'd-gp2-aass1-1',
                'host' => 'd-gp2-aass1-1.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:33',
                'updated_at' => '2019-07-12 21:33:33',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'd-gp2-aass1-2',
                'host' => 'd-gp2-aass1-2.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:33',
                'updated_at' => '2019-07-12 21:33:33',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'd-gp2-aass1-3',
                'host' => 'd-gp2-aass1-3.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'd-gp2-aass1-4',
                'host' => 'd-gp2-aass1-4.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'd-gp2-aass1-5',
                'host' => 'd-gp2-aass1-5.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'd-gp2-aass1-6',
                'host' => 'd-gp2-aass1-6.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'd-gp2-aass1-7',
                'host' => 'd-gp2-aass1-7.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'd-gp2-aass1-8',
                'host' => 'd-gp2-aass1-8.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'd-gp2-aass1-9',
                'host' => 'd-gp2-aass1-9.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'd-gp2-aass1-10',
                'host' => 'd-gp2-aass1-10.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'd-gp2-aass1-11',
                'host' => 'd-gp2-aass1-11.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:34',
                'updated_at' => '2019-07-12 21:33:34',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'd-gp2-aass1-12',
                'host' => 'd-gp2-aass1-12.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'd-gp2-aass1-13',
                'host' => 'd-gp2-aass1-13.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'd-gp2-aass1-14',
                'host' => 'd-gp2-aass1-14.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'd-gp2-aass1-15',
                'host' => 'd-gp2-aass1-15.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'd-gp2-aass1-16',
                'host' => 'd-gp2-aass1-16.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'd-gp2-aass1-17',
                'host' => 'd-gp2-aass1-17.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'd-gp2-aass1-18',
                'host' => 'd-gp2-aass1-18.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'd-gp2-aass1-19',
                'host' => 'd-gp2-aass1-19.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'd-gp2-aass1-20',
                'host' => 'd-gp2-aass1-20.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:35',
                'updated_at' => '2019-07-12 21:33:35',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'd-gp2-aass1-21',
                'host' => 'd-gp2-aass1-21.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:36',
                'updated_at' => '2019-07-12 21:33:36',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'd-gp2-aass1-22',
                'host' => 'd-gp2-aass1-22.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:36',
                'updated_at' => '2019-07-12 21:33:36',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'd-gp2-aass1-23',
                'host' => 'd-gp2-aass1-23.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:36',
                'updated_at' => '2019-07-12 21:33:36',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'd-gp2-aass1-24',
                'host' => 'd-gp2-aass1-24.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:36',
                'updated_at' => '2019-07-12 21:33:36',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'd-gp2-aass1-25',
                'host' => 'd-gp2-aass1-25.imovetv.com',
                'server_exists' => 0,
                'caipy_is_setup' => 0,
                'ready_to_receive_conf' => 0,
                'last_received_conf' => NULL,
                'configured' => 0,
                'notes' => NULL,
                'cs_token' => 'afd0b036-625a-3aa8-b639-9dc8c8fff0ff',
                'created_at' => '2019-07-12 21:33:36',
                'updated_at' => '2019-07-12 21:33:36',
                'deleted_at' => NULL,
                'group_id' => 1,
                'status_id' => 2,
                'instance_id' => NULL,
                'rc_id' => 1,
                'ss_func_id' => NULL,
            ),
        ));
        
        
    }
}