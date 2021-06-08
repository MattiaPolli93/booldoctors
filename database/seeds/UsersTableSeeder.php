<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newUser = new User;
            $newUser->name = $faker->firstName();
            $newUser->surname = $faker->lastName();
            $newUser->email = $faker->email();
            $newUser->expire_date = Carbon::now();
            $newUser->password = Hash::make($faker->word());
            $newUser->save();
        }
    }
}
