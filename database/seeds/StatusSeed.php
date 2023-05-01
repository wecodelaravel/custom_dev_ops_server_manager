<?php

use Illuminate\Database\Seeder;

class StatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'status' => 'RUNNING',],
            ['id' => 2, 'status' => 'NOT RUNNING',],
            ['id' => 3, 'status' => 'STOPPED',],

        ];

        foreach ($items as $item) {
            \App\Status::create($item);
        }
    }
}
