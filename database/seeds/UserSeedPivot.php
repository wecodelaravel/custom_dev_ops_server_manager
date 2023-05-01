<?php

use Illuminate\Database\Seeder;

class UserSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'role' => [1],
            ],
            2 => [
                'role' => [1],
            ],
            3 => [
                'role' => [1],
            ],
            4 => [
                'role' => [1],
            ],
            5 => [
                'role' => [1],
            ],
            6 => [
                'role' => [1],
            ],
            7 => [
                'role' => [2],
            ],

        ];

        foreach ($items as $id => $item) {
            $user = \App\User::find($id);

            foreach ($item as $key => $ids) {
                $user->{$key}()->sync($ids);
            }
        }
    }
}
