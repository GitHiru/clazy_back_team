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
        $dt = Carbon::now();
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
                'created_at' => $dt,
                'updated_at' => $dt,
                'created_at_year' => $dt->year,
                'created_at_month' => $dt->month,
                'created_at_day' => $dt->day,
                // 'created_at_week' => $dt->day0fWeek,
                // 'user_id' => $user->id
            ]);
        }
    }
}
