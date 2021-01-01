<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role' => 'Администратор',
                'slug' => 'admin',
                'description' => 'Пользователи с таким модификатором имеют полный доступ к управлению сайтом',
            ],
            [
                'role' => 'Пользователь',
                'slug' => 'user',
                'description' => 'Пользователи с таким модификатором имеют доступ к личному кабинету.',
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
