<?php

use Illuminate\Database\Seeder;

class ProtocolSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'protocol' => 'UDP', 'real_name' => 'User Datagram Protocol',],
            ['id' => 2, 'protocol' => 'RTP', 'real_name' => 'Real-time Transport Protocol',],
            ['id' => 3, 'protocol' => 'MOVE', 'real_name' => 'Path /home/caipy/segments_in',],
            ['id' => 4, 'protocol' => 'HLS', 'real_name' => 'HTTP Live Streaming',],

        ];

        foreach ($items as $item) {
            \App\Protocol::create($item);
        }
    }
}
