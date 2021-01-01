<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Разное',
                'slug' => 'raznoe',
            ],
            [
                'title' => 'ПДД',
                'slug' => 'PDD',
            ],
            [
                'title' => 'IQ',
                'slug' => 'IQ',
            ],
            [
                'title' => 'Образование',
                'slug' => 'obrazovanie',
            ]
        ];
        DB::table('categories')->insert($categories);
    }
}
