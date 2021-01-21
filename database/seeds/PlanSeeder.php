<?php

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'type' => 'RECURRING',
            'name' => 'Free Plan',
            'price' => 0.00,
            'interval' => 'EVERY_30_DAYS',
            'capped_amount' => 1.00,
            'terms' => 0.00,
            'trial_days' => 0.00,
            'test' => true,
            'on_install' => 1,
        ]);
        DB::table('plans')->insert([
            'type' => 'RECURRING',
            'name' => 'Paid Plan',
            'price' => 5.00,
            'interval' => 'EVERY_30_DAYS',
            'capped_amount' => 10.00,
            'terms' => 'Test terms',
            'trial_days' => 7,
            'test' => true,
            'on_install' => 0,
        ]);

    }
}
