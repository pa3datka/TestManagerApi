<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessType = [
            [
                'type' => 'Виден всем',
                'description' => 'Тест с таким модификатором доступен всем пользователям'
            ],
            [
                'type' => 'Не показывать',
                'description' => 'Тест с таким модификатором доступен только автору теста'
            ]
        ];
        DB::table('types_access_tests')->insert($accessType);
    }
}
