<?php

use App\Specialization;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $specialization = Specialization::all();

        for ($i=0; $i < 10; $i++) { 
            $newUser = new User;
            $newUser->name = $faker->firstName();
            $newUser->surname = $faker->lastName();
            $newUser->email = $faker->email();
            /* $newUser->expire_date = Carbon::now(); */
            $newUser->password = Hash::make($faker->word());

            $newUser->save();

            $numbers = range(1, count($specialization));
            shuffle($numbers);
            $spec = rand(1, 6);
            for ($j = 0; $j < $spec; $j++) {
                $newUser->specializations()->attach($numbers[$j]);
            }
        }
        // foreach (range(1, 20) as $index) {
        //     DB::table('specialization_user')->insert([
        //         'user_id' => rand(1, 10),
        //         'specialization_id' => $faker->unique()->randomNumber(1, count($specialization))
        //     ]);
        // }

    }
}
