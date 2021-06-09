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
        
        foreach ($doctors as $doctor) {
            for ($i=0; $i < rand(0, 5); $i++) { 
                $newComment = new Comment();

                $newComment->user_id = $doctor->id; 
                if (rand(0, 1)){
                        $newComment->username = $faker->name();
                }
                
                if (rand(0, 1)) {
                    $newComment->comment = $faker->text(200);
                }
                $newComment->rate = rand(1, 5);
                $newComment->added_on = $faker->dateTimeBetween("-2 years", "now"); 
                $newComment->save();
            }
        }
    }
}
