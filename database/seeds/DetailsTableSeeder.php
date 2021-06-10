<?php

use App\Detail;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Database\Seeder;

class DetailsTableSeeder extends Seeder
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
            $newDetail = new Detail;
            $newDetail->user_id = $doctor->id;
            $newDetail->image = 'https://via.placeholder.com/150';

            if (rand(0, 1)) {
                $newDetail->bio = $faker->text(500);
            }
            
            $newDetail->address = $faker->streetAddress();

            if (rand(0, 1)) {
                $newDetail->phone = $faker->phoneNumber();
            }
            $newDetail->save();
        }
    }
}
