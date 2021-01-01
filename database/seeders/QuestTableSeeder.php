<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quest = [
            [
                'quest' => 'Вопрос 1',
                'evaluation' => 1,
                'number' => 1,
                'test_id' => 1
            ],
            [
                'quest' => 'Вопрос 2',
                'evaluation' => 1,
                'number' => 2,
                'test_id' => 1
            ],
            [
                'quest' => 'Вопрос 3',
                'evaluation' => 1,
                'number' => 3,
                'test_id' => 1
            ],
            [
                'quest' => 'Вопрос 4',
                'evaluation' => 1,
                'number' => 4,
                'test_id' => 1
            ]
        ];
        DB::table('quests')->insert($quest);
    }
}
