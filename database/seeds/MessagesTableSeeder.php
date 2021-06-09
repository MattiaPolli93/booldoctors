<?php

use App\User;
use App\Message;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
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
            for ($i = 0; $i < rand(1, 3); $i++) {
                $newMessage = new Message();

                $newMessage->user_id = $doctor->id;            
                $newMessage->email = $faker->safeEmail();
                $newMessage->message = $faker->text(400);
                $newMessage->added_on = $faker->dateTimeBetween("-2 years", "now");
                if (rand(0, 1)) {
                    $newMessage->resolved = 1;
                }
                $newMessage->save();
            }
        }   
    }
}
