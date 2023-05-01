<?php

use Illuminate\Database\Seeder;

class RoleConventionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'role_convention' => 'Sync Server', 'role_convention_value' => 'ss',],
            ['id' => 2, 'role_convention' => 'Aggregation Server', 'role_convention_value' => 'as',],
            ['id' => 3, 'role_convention' => 'Channel Server', 'role_convention_value' => 'cs',],

        ];

        foreach ($items as $item) {
            \App\RoleConvention::create($item);
        }
    }
}
