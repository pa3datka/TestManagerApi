<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
            [
                'answer' => 'правельно',
                'status' => 1,
                'variant' => 'text',
                'quest_id' => 1
            ],
            [
                'answer' => 'не правельно',
                'status' => 0,
                'variant' => 'text',
                'quest_id' => 1
            ],
            [
                'answer' => 'не правельно',
                'status' => 0,
                'variant' => 'text',
                'quest_id' => 1
            ],
            [
                'answer' => 'не правельно',
                'status' => 0,
                'variant' => 'text',
                'quest_id' => 1
            ],
            [
                'answer' => 'правельно',
                'status' => 1,
                'variant' => 'text',
                'quest_id' => 2
            ],
            [
                'answer' => 'не правельно',
                'status' => 0,
                'variant' => 'text',
                'quest_id' => 2
            ],
            [
                'answer' => 'правельно',
                'status' => 1,
                'variant' => 'text',
                'quest_id' => 3
            ],
            [
                'answer' => 'не правельно',
                'status' => 0,
                'variant' => 'text',
                'quest_id' => 3
            ],
            [
                'answer' => 'правельно',
                'status' => 1,
                'variant' => 'text',
                'quest_id' => 4
            ],
            [
                'answer' => 'не правельно',
                'status' => 0,
                'variant' => 'text',
                'quest_id' => 4
            ]
        ];
        DB::table('answers')->insert($answers);
    }
}
