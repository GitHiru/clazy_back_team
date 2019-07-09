<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $payments = [
            ['payment' => '1000',],
            ['payment' => '450',],
            ['payment' => '150',],
            ['payment' => '-150',],
            ['payment' => '2300',],
            ['payment' => '380',],
            ['payment' => '-380',],
            ['payment' => '50',],
        ];

        foreach ($payments as $payment) {
            DB::table('payments')->insert([
                'payment' => $payment['payment'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id
            ]);
        }
    }
}
