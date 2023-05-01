<?php

use Illuminate\Database\Seeder;

class SyncServerFunctionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'type' => 'RECORDING',],
            ['id' => 2, 'type' => 'DETECTION',],
            ['id' => 3, 'type' => 'DISCOVERY',],
            ['id' => 4, 'type' => 'NOTIFICATIONS',],

        ];

        foreach ($items as $item) {
            \App\SyncServerFunction::create($item);
        }
    }
}
