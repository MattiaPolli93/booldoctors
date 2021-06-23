<?php

use App\Plan;
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
        $plan = Plan::all();

        $names = [
            'Mario',            
            'Giacomo', 
            'Luigi',
            'Mattia',
            'Stefano',
            'Nicolò',
            'Gabriele',
            'Giuseppe',
            'Alfredo',
            'Adriano'
        ];

        $surnames = [
            'Rossi',            
            'Corti', 
            'Bodritti',
            'Polli',
            'Lana',
            'Matassoli',
            'Bianchi',
            'Baglio',
            'Storti',
            'Poretti'
        ];
        

        for ($i=0; $i < 10; $i++) { 
            $newUser = new User;
            for($j = 0; $j < count($names); $j++){
                $newUser->name = $names[array_rand($names)];
            }       
            for($z = 0; $z < count($surnames); $z++){
                $newUser->surname = $surnames[array_rand($surnames)];
            } 
            $newUser->email = $faker->email();            
            $newUser->password = Hash::make($faker->word());
            $newUser->save();
            
            // seed della tabella pivot plan_user
            $newUser->plans()->attach($newUser, [
                'user_id' => $newUser->id,
                'plan_id' => rand(1, 3),
                'expire_date' => $faker->dateTimeBetween('now', '+1 days')
            ]);
            // $newUser->plans()->expire_date = $faker->dateTimeBetween('now', '+1 days');
            
            // seed della tabella pivot spec_user: prendo tra 1 e 6 spec casuali diverse e le associo a newUser
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
