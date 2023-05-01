<?php

use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('filters')->delete();
        
        \DB::table('filters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'RAW',
                'created_at' => '2019-06-12 22:25:21',
                'updated_at' => '2019-06-12 22:25:21',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'default',
                'created_at' => '2019-06-12 22:25:34',
                'updated_at' => '2019-06-12 22:25:34',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'detailed',
                'created_at' => '2019-06-12 22:25:46',
                'updated_at' => '2019-06-12 22:25:46',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'default-unmerge',
                'created_at' => '2019-06-12 22:26:02',
                'updated_at' => '2019-06-12 22:26:02',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'pods',
                'created_at' => '2019-06-12 22:26:14',
                'updated_at' => '2019-06-12 22:26:14',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'pods-unmerge',
                'created_at' => '2019-06-12 22:26:29',
                'updated_at' => '2019-06-12 22:26:29',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'epg-starts',
                'created_at' => '2019-06-12 22:26:54',
                'updated_at' => '2019-06-12 22:26:54',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'epg-correction',
                'created_at' => '2019-06-12 22:27:11',
                'updated_at' => '2019-06-12 22:27:11',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}