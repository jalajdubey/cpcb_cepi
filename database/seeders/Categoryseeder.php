<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('categories')->insert([
            'category_name' => 'Air Environment',
            
        ]);*/

        $data = [
            ['category_name' => 'Air Environment'],
            ['category_name' => 'Water Environment'],
            ['category_name' => 'Land Environment'],
            ['category_name' => 'Infrastructure/renewal measures',],
            ['category_name' => 'Other'],
        ];
        //Model::insert($data); // Eloquent approach
        DB::table('categories')->insert($data); // Query Builder approach

    }
}
