<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Graphic Design',
            'slug' => 'graphic-design'
        ]);
    }
}
