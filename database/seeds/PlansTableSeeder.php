<?php

use App\Plan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'type' => 'regular',
                'price' => 2.99,
                'period' => 24
            ],
            [
                'type' => 'medium',
                'price' => 5.99,
                'period' => 72
            ],
            [
                'type' => 'premium',
                'price' => 9.99,
                'period' => 144
            ],
        ];

        // Carbon::parse(now('GMT+2'))->addHours(24)->format('Y-m-d H:i:s')
        foreach ($plans as $plan) {
            $newPlan = new Plan;
            $newPlan->plan = $plan['type'];
            $newPlan->price = $plan['price'];
            $newPlan->period = $plan['period'];
            $newPlan->save();
        }
    }
}
