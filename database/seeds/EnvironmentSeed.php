<?php

use Illuminate\Database\Seeder;

class EnvironmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'environment' => 'Dev', 'env_value' => 'd',],
            ['id' => 2, 'environment' => 'QA', 'env_value' => 'q',],
            ['id' => 3, 'environment' => 'Beta', 'env_value' => 'b',],
            ['id' => 4, 'environment' => 'TEST', 'env_value' => 't',],

        ];

        foreach ($items as $item) {
            \App\Environment::create($item);
        }
    }
}
