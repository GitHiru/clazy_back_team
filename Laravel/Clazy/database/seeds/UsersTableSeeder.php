<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pikopoko',
            'email' => 'pikopoko@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'salary' => '200000',
            'payroll_date' => '25',
        ]);
    }
}
