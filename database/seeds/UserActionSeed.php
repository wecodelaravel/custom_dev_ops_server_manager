<?php

use Illuminate\Database\Seeder;

class UserActionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 1,],
            ['id' => 2, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 2,],
            ['id' => 3, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 3,],
            ['id' => 4, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 4,],
            ['id' => 5, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 5,],
            ['id' => 6, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 6,],
            ['id' => 7, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 7,],
            ['id' => 8, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 8,],
            ['id' => 9, 'user_id' => 1, 'action' => 'created', 'action_model' => 'video_server_types', 'action_id' => 9,],
            ['id' => 10, 'user_id' => 1, 'action' => 'created', 'action_model' => 'notification_server_types', 'action_id' => 1,],
            ['id' => 11, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'notification_server_types', 'action_id' => 1,],
            ['id' => 12, 'user_id' => 1, 'action' => 'created', 'action_model' => 'notification_server_types', 'action_id' => 2,],
            ['id' => 13, 'user_id' => 1, 'action' => 'created', 'action_model' => 'notification_server_types', 'action_id' => 3,],
            ['id' => 14, 'user_id' => 1, 'action' => 'created', 'action_model' => 'notification_server_types', 'action_id' => 4,],
            ['id' => 15, 'user_id' => 1, 'action' => 'created', 'action_model' => 'notification_server_types', 'action_id' => 5,],
            ['id' => 16, 'user_id' => 1, 'action' => 'created', 'action_model' => 'notification_server_types', 'action_id' => 6,],
            ['id' => 17, 'user_id' => 1, 'action' => 'created', 'action_model' => 'notification_server_types', 'action_id' => 7,],
            ['id' => 18, 'user_id' => 1, 'action' => 'created', 'action_model' => 'protocols', 'action_id' => 1,],
            ['id' => 19, 'user_id' => 1, 'action' => 'created', 'action_model' => 'protocols', 'action_id' => 2,],
            ['id' => 20, 'user_id' => 1, 'action' => 'created', 'action_model' => 'protocols', 'action_id' => 3,],
            ['id' => 21, 'user_id' => 1, 'action' => 'created', 'action_model' => 'protocols', 'action_id' => 4,],
            ['id' => 22, 'user_id' => 1, 'action' => 'created', 'action_model' => 'users', 'action_id' => 2,],
            ['id' => 23, 'user_id' => 1, 'action' => 'created', 'action_model' => 'users', 'action_id' => 3,],
            ['id' => 24, 'user_id' => 1, 'action' => 'created', 'action_model' => 'users', 'action_id' => 4,],
            ['id' => 25, 'user_id' => 1, 'action' => 'created', 'action_model' => 'users', 'action_id' => 5,],
            ['id' => 26, 'user_id' => 1, 'action' => 'created', 'action_model' => 'users', 'action_id' => 6,],
            ['id' => 27, 'user_id' => 1, 'action' => 'created', 'action_model' => 'channel_servers', 'action_id' => 1,],
            ['id' => 28, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'channel_servers', 'action_id' => 1,],
            ['id' => 29, 'user_id' => 1, 'action' => 'created', 'action_model' => 'csis', 'action_id' => 1,],
            ['id' => 30, 'user_id' => 1, 'action' => 'created', 'action_model' => 'channels', 'action_id' => 1,],
            ['id' => 31, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'csis', 'action_id' => 1,],
            ['id' => 32, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'channel_servers', 'action_id' => 1,],
            ['id' => 33, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'channel_servers', 'action_id' => 1,],
            ['id' => 34, 'user_id' => 1, 'action' => 'created', 'action_model' => 'environments', 'action_id' => 1,],
            ['id' => 35, 'user_id' => 1, 'action' => 'created', 'action_model' => 'environments', 'action_id' => 2,],
            ['id' => 36, 'user_id' => 1, 'action' => 'created', 'action_model' => 'environments', 'action_id' => 3,],
            ['id' => 37, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'environments', 'action_id' => 3,],
            ['id' => 38, 'user_id' => 1, 'action' => 'created', 'action_model' => 'environments', 'action_id' => 4,],
            ['id' => 39, 'user_id' => 1, 'action' => 'created', 'action_model' => 'environments', 'action_id' => 5,],
            ['id' => 40, 'user_id' => 1, 'action' => 'created', 'action_model' => 'role_conventions', 'action_id' => 1,],
            ['id' => 41, 'user_id' => 1, 'action' => 'created', 'action_model' => 'role_conventions', 'action_id' => 2,],
            ['id' => 42, 'user_id' => 1, 'action' => 'created', 'action_model' => 'role_conventions', 'action_id' => 3,],
            ['id' => 43, 'user_id' => 1, 'action' => 'created', 'action_model' => 'users', 'action_id' => 7,],
            ['id' => 44, 'user_id' => 1, 'action' => 'created', 'action_model' => 'group_builders', 'action_id' => 1,],
            ['id' => 45, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'group_builders', 'action_id' => 1,],
            ['id' => 46, 'user_id' => 1, 'action' => 'created', 'action_model' => 'groups', 'action_id' => 1,],
            ['id' => 47, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 2,],
            ['id' => 48, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'instances', 'action_id' => 1,],
            ['id' => 49, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'instances', 'action_id' => 2,],
            ['id' => 50, 'user_id' => 1, 'action' => 'created', 'action_model' => 'role_conventions', 'action_id' => 4,],
            ['id' => 51, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 3,],
            ['id' => 52, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 4,],
            ['id' => 53, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 5,],
            ['id' => 54, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'instances', 'action_id' => 3,],
            ['id' => 55, 'user_id' => 1, 'action' => 'created', 'action_model' => 'roles', 'action_id' => 3,],
            ['id' => 56, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'csis', 'action_id' => 1,],
            ['id' => 57, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'groups', 'action_id' => 1,],
            ['id' => 58, 'user_id' => 1, 'action' => 'created', 'action_model' => 'groups', 'action_id' => 2,],
            ['id' => 59, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'instances', 'action_id' => 3,],
            ['id' => 60, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'instances', 'action_id' => 4,],
            ['id' => 61, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'instances', 'action_id' => 5,],
            ['id' => 62, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'groups', 'action_id' => 2,],
            ['id' => 63, 'user_id' => 1, 'action' => 'created', 'action_model' => 'groups', 'action_id' => 3,],
            ['id' => 64, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 6,],
            ['id' => 65, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'groups', 'action_id' => 3,],
            ['id' => 66, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'groups', 'action_id' => 3,],
            ['id' => 67, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'instances', 'action_id' => 6,],
            ['id' => 68, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'channels', 'action_id' => 1,],
            ['id' => 69, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'role_conventions', 'action_id' => 2,],
            ['id' => 70, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'environments', 'action_id' => 4,],
            ['id' => 71, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'csis', 'action_id' => 1,],
            ['id' => 72, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'channel_servers', 'action_id' => 1,],
            ['id' => 73, 'user_id' => 1, 'action' => 'created', 'action_model' => 'groups', 'action_id' => 4,],
            ['id' => 74, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 7,],
            ['id' => 75, 'user_id' => 1, 'action' => 'created', 'action_model' => 'channel_servers', 'action_id' => 2,],
            ['id' => 76, 'user_id' => 1, 'action' => 'created', 'action_model' => 'aggregation_servers', 'action_id' => 1,],
            ['id' => 77, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'instances', 'action_id' => 7,],
            ['id' => 78, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'groups', 'action_id' => 4,],
            ['id' => 79, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'instances', 'action_id' => 7,],
            ['id' => 80, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'channel_servers', 'action_id' => 2,],
            ['id' => 81, 'user_id' => 1, 'action' => 'deleted', 'action_model' => 'aggregation_servers', 'action_id' => 1,],
            ['id' => 82, 'user_id' => 1, 'action' => 'created', 'action_model' => 'groups', 'action_id' => 5,],
            ['id' => 83, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 8,],
            ['id' => 84, 'user_id' => 1, 'action' => 'created', 'action_model' => 'channel_servers', 'action_id' => 3,],
            ['id' => 85, 'user_id' => 1, 'action' => 'created', 'action_model' => 'aggregation_servers', 'action_id' => 2,],
            ['id' => 86, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 9,],
            ['id' => 87, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'instances', 'action_id' => 8,],
            ['id' => 88, 'user_id' => 1, 'action' => 'created', 'action_model' => 'instances', 'action_id' => 10,],
            ['id' => 89, 'user_id' => 1, 'action' => 'created', 'action_model' => 'syncservers', 'action_id' => 1,],
            ['id' => 90, 'user_id' => 1, 'action' => 'created', 'action_model' => 'syncservers', 'action_id' => 2,],
            ['id' => 91, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'syncservers', 'action_id' => 2,],
            ['id' => 92, 'user_id' => 1, 'action' => 'created', 'action_model' => 'syncservers', 'action_id' => 3,],
            ['id' => 93, 'user_id' => 1, 'action' => 'created', 'action_model' => 'syncservers', 'action_id' => 4,],
            ['id' => 94, 'user_id' => 1, 'action' => 'created', 'action_model' => 'syncservers', 'action_id' => 5,],
            ['id' => 95, 'user_id' => 1, 'action' => 'created', 'action_model' => 'csis', 'action_id' => 2,],
            ['id' => 96, 'user_id' => 1, 'action' => 'created', 'action_model' => 'csos', 'action_id' => 1,],
            ['id' => 97, 'user_id' => 1, 'action' => 'created', 'action_model' => 'csos', 'action_id' => 2,],
            ['id' => 98, 'user_id' => 1, 'action' => 'created', 'action_model' => 'csos', 'action_id' => 3,],
            ['id' => 99, 'user_id' => 1, 'action' => 'created', 'action_model' => 'csos', 'action_id' => 4,],

        ];

        foreach ($items as $item) {
            \App\UserAction::create($item);
        }
    }
}