<?php

use App\Service;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $doctors = User::all();

        foreach ($doctors as $doctor) {

            for ($i=0; $i < rand(3,10); $i++) { 
                $newService = new Service();
                $newService->user_id = $doctor->id;
                $newService->service = $faker->word();
                $newService->price = $faker->randomFloat(2, 100, 9999);
                $newService->save();
            }
        }
    }
}
