<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Clazykun',
                'email' => 'Clazykun@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'saving' => '0',
                'salary' => '0',
            ],
            [
                'name' => 'pikopoko',
                'email' => 'pikopoko@gmail.com',
                'password' => bcrypt('000000'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'saving' => '0',
                'salary' => '0',
            ]
        );
    }
}
