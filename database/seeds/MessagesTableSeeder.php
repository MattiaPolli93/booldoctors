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

        $messages = [
            'Dottore, chiami un dottore!',
            'Dottore ho malissimo alla schiena, mi contatti il prima possibile!',
            'Dottore mi chiami Google!',
            'Dottore, ho bisogna di una visita omeopatica urgente!',
            'Mi può passare il Dott. Burioni?',
            'Ho mal di pancia, eppure ieri ho mangiato solo 4 hamburger, 3 bistecche e 2 pizze. Cosa posso fare?',
            'Quante volte devo prendere l\'aspirina per dormire sereno?',
            'Dottore, che ne pensa di Astrazeneca?',
            'Dottore, ma la mascherina? Quando la devo mettere? Se parlo con qualcuno da vicino la posso abbassare?',
            'Dotto\', fa caldo!',
            'Dottore, quando posso ritirare i miei esami?',
        ];

        foreach ($doctors as $doctor) {
            for ($i = 0; $i < rand(3, 10); $i++) {
                $newMessage = new Message();

                $newMessage->user_id = $doctor->id;            
                $newMessage->email = $faker->safeEmail();
                // $newMessage->message = $faker->text(400);
                for ($i = 0; $i < count($messages); $i++) {
                    $newMessage->message = $messages[array_rand($messages)];
                }

                $newMessage->added_on = $faker->dateTimeBetween("-5 months", "now");
                if (rand(0, 1)) {
                    $newMessage->resolved = 1;
                }
                $newMessage->save();
            }
        }   
    }
}
