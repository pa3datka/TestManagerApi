<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = [
            [
                'head' => 'Тестовый тест(виден всем)',
                'description' => 'Очень длинное описание теста....',
                'access_id' => 1,
                'calculation_id' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'attempts' => 0,
                'time' => 0,
            ]
        ];
        DB::table('tests')->insert($test);
    }
}
