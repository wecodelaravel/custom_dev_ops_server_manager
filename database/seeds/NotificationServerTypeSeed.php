<?php

use Illuminate\Database\Seeder;

class NotificationServerTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'notification_server_type' => 'NoticeRouter',],
            ['id' => 2, 'notification_server_type' => 'Caipy',],
            ['id' => 3, 'notification_server_type' => 'Imagine',],
            ['id' => 4, 'notification_server_type' => 'Harmonic',],
            ['id' => 5, 'notification_server_type' => 'Envivio',],
            ['id' => 6, 'notification_server_type' => 'Octoshape',],
            ['id' => 7, 'notification_server_type' => 'MOVE',],
            ['id' => 8, 'notification_server_type' => 'Elemental Live',],

        ];

        foreach ($items as $item) {
            \App\NotificationServerType::create($item);
        }
    }
}
