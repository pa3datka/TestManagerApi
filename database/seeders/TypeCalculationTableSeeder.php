<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeCalculationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calculation = [
          [
              'type' => 'Баллы',
              'slug' => 'Score',
              'description' => 'Оценка результата в баллах'
          ],
            [
                'type' => 'Проценты',
                'slug' => 'Percent',
                'description' => 'Оценка результата в процентах'
            ]
        ];

        DB::table('type_calculation_results')->insert($calculation);
    }
}
