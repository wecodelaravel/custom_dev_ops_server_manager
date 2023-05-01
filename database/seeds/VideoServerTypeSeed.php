<?php

use Illuminate\Database\Seeder;

class VideoServerTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'video_server_type' => 'Elemental Delta',],
            ['id' => 2, 'video_server_type' => 'Caipy',],
            ['id' => 3, 'video_server_type' => 'Move',],
            ['id' => 4, 'video_server_type' => 'FWM',],
            ['id' => 5, 'video_server_type' => 'Harmonic',],
            ['id' => 6, 'video_server_type' => 'Edgeware Orbit',],
            ['id' => 7, 'video_server_type' => 'Fabrix',],
            ['id' => 8, 'video_server_type' => 'Spbtv',],
            ['id' => 9, 'video_server_type' => 'Nangu',],

        ];

        foreach ($items as $item) {
            \App\VideoServerType::create($item);
        }
    }
}
