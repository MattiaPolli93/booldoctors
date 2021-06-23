<?php

use App\Comment;
use App\User;
use Faker\Generator as Faker; 
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $doctors = User::all();
        $names = [
            'Mario',
            'Giacomo',
            'Luigi',
            'Mattia',
            'Stefano',
            'Nicolo',
            'Gabriele',
            'Giuseppe',
            'Alfredo',
            'Adriano',
            'Enrico',
            'Alberto',
            'Aldo',
            'Giovanni',
            'Chiara',
            'Francesca',
            'Maria',
            'Raffaella',
            'Giulia',
            'Cristina',
        ];
        
        foreach ($doctors as $doctor) {
            for ($i = 0; $i < rand(5, 15); $i++) { 
                $newComment = new Comment();

                $newComment->user_id = $doctor->id; 
                if (rand(0, 1)){
                    // $newComment->username = $faker->name();
                    for ($i = 0; $i < count($names); $i++) {
                        $newComment->username = $names[array_rand($names)];
                    }
                }
                
                if (rand(0, 1)) {
                    $newComment->comment = $faker->text(200);
                }

                $newComment->rate = rand(1, 5);
                $newComment->added_on = $faker->dateTimeBetween("-5 months", "now"); 
                $newComment->save();
            }
        }
    }
}
