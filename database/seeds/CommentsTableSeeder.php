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

        $comments = [
            'Bravissimo dottore, altamente consigliato!',
            'Mani di velluto, consigliatissimo',
            'Nella media',
            'senza infamia e senza lode',
            'Da denuncia!',
            'Gentile e professionale, molto chiaro nelle spiegazioni. Ti mette a proprio agio lo studio è accogliente. Lo consiglio',
            'Spiegazioni chiare e precise molto cortese e disponibile. Lo consiglio vivamente ad altre persone.',
            'Cortesia puntualità disponibilità Per la cura dobbiamo vedere in futuro per adesso non posso esprimere parere lo dovrei fare dopo aver fatto la cura.',
            'Sono il ragazzo affetto dalle varici al collo vescicale..Volevodire Che il dottore e’ Bravissimo!',
            'Il dottore da un messaggio (probabilmente privo di complete informazioni) è riuscito a mettere immediatamente a fuoco il problema, cosa non avvenuta in una visita frettolosa al San Paolo di Milano, orientandomi rispetto ai passi da seguire per una corretta diagnosi e nel contempo restituendomi fiducia in una possibile guarigione. Lo ringrazio di cuore, in attesa di poterlo incontrare anche di persona per una visita ambulatoriale.',
            'Professionalità, cortesia ,attenzione, puntualità. L\'empatia con chi prende cura delle problematiche vale più della cura in sé stessa.',
            'Nello studio ho trovato molta cortesia e disponibilità. Il dottore e propenso all ascolto e subito valuta la situazione di salute. Mi sono sentita subito a mio agio e il dermatologo adatto a me',
            'Molto soddisfatto della visita urologica, professionale, super puntuale e disponibile. Assolutamente consigliato',
            'Consigliato a tt un dottore bravissimo,e capisce e risolve il problema. Nn lo cambierei con nessuno. Il numero uno.',
            'Persona molto professionale e gentile e soprattutto studio pulitissimo.',
        ];

        foreach ($doctors as $doctor) {
            $r = rand(5, 15);
            for ($i = 0; $i < $r; $i++) { 
                $newComment = new Comment();

                $newComment->user_id = $doctor->id; 
                if (rand(0, 1)){
                    // $newComment->username = $faker->name();
                    for ($j = 0; $j < count($names); $j++) {
                        $newComment->username = $names[array_rand($names)];
                    }
                }
                
                if (rand(0, 1)) {
                    for ($k = 0; $k < count($comments); $k++) {
                        $newComment->comment = $comments[array_rand($comments)];
                    }
                    // $newComment->comment = $faker->text(200);
                }

                $newComment->rate = rand(1, 5);
                $newComment->added_on = $faker->dateTimeBetween("-5 months", "now"); 
                $newComment->save();
            }
        }
    }
}
