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

        $bios = [
            'Il Dottore si è laureato in Dietistica all\'Università degli Studi di Messina e successivamente ha conseguito la Laurea Magistrale in Alimentazione e Nutrizione Umana all\'Università degli Studi di Milano. Dall\'anno 2013 al 2014 è fornito Consulenze nutrizionali presso farmacie, palestre, erboristerie. Dall\'anno 2015 al 2016 ha elaborato una tesi sperimentale presso l\'ambulatorio AGITA (ambulatorio gestione integrata terapie antiretrovirali), in relazione ad uno studio della correlazione tra sindrome metabolica, grasso viscerale e farmaci per la cura dell\'HIV',
            'Il Dottore nel 2008 ha conseguito la Laurea Specialistica in Medicina e Chirurgia presso la Seconda Università degli Studi di Napoli. Dal 2009 è Responsabile di Laserterapia Avanzata, DNA Laser Science, Napoli; dal 2010 al 2011 Surgical Fellow, Santa Casa de Misericordia, Rio de Janeiro (Brasil) e Surgical Fellow, Hospital da Plastica, Rio de Janeiro (Brasil); dal 2012 al 2013 Fellow in Chirurgia della mammella, azio Ospedale San Giovanni Addolorata, Roma; nel 2013 ha conseguito l\' Abilitazione inglese alla pratica chirurgica; dal 2015 al 2016 Fellow in Chirurgia Ricostruttiva della mammella',
            'Il Dottore si laurea in Medicina e Chirurgia all’Università la “La Sapienza” di Roma con 110 e Lode e si specializza in Chirurgia Plastica Ricostruttiva ed Estetica N.O. all’Università di Roma "Tor Vergata" con il massimo dei voti e la lode accademica. Consegue il Dottorato per la ricerca PhD in Chirurgia Rigenerativa presso il dipartimento di Chirurgia Plastica dell’Università di Roma “Tor Vergata”. Presta servizio nel Reparto di Chirurgia Plastica del Policlinico Umberto I di Roma e nel Reparto di Chirurgia Plastica e Centro Grandi Ustionati dell’Ospedale Sant\'Eugenio di Roma. Svolge attività di Laserterapia in Chirurgia Plastica al Policlinico Casilino. In costante aggiornamento, partecipa a numerosi Corsi Internazionali sulla chirurgia facciale e la rinoplastica presso l’Università di Bruxelles (Belgio) e in Texas (USA) e frequenta l’Akademikliniken di Stoccolma, famosa per l’applicazione delle migliori tecniche di Chirurgia Estetica.',
            'Ho conseguito nel 1986 la Laurea in Psicologia presso l\' Università degli Studi "La Sapienza" di Roma e mi sono successivamente specializzato in Psicoterapia nel 1991 presso la Scuola Europea di Orgonomia (psicoterapia psicocorporea e bioenergetica)  comprendente sia quattro anni di corso  che un complesso training personale con psicoterapia di base, psicoterapia di controllo, psicoterapia didattica e psicoterapia di gruppo. Sono socio fondatore, docente e didattaparte della SIAR (Società Italiana di Analisi Reichiana), sono Master Advanced in PNL (Programmazione Neurolinguistica),  specializzato in EMDR e Psicoterapia di coppia con metodo Gottman, ho fatto   attività di Sportello di ascolto in diversi Istituti di Istruzione superiore a Napoli. fino all\'avvento del covid,  Attualmente esercito libera professione e ricevo su appuntamento presso gli studi privati di Napoli e Pescara.',
            'Il Dottore si è laureato in Podologia nel 2013 presso l\'Università degli Studi di Milano. Durante il corso di studi ha svolto attività di tirocinio nel reparto di Podologia dell\'Istituto Ortopedico Galeazzi di Milano. Attualmente svolge attività di libero professionista a domicilio ed in collaborazione con Centro Medico Althea. Il Podologo è in grado di attuare un\'azione di prevenzione, valutazione e cura delle patologie del piede, in special modo di pazienti: diabetici, reumatici, arteriopatici e neuropatici. Attraverso un\'accurata visita clinica esegue trattamenti finalizzati a favorire la deambulazione.',
            'Il Dott. ha conseguito un master quadriennale in Sessuologia acquisendo le competenze in materia sessuologica. Si è laureato in Psicologia presso l\'Università La Sapienza di Roma nel 2000, e successivamente ha conseguito la Specializzazione in Psicoterapia Breve Strategica ed in Psicoterapia Corporea presso l\'I.S.P. di Roma. Dopo la Laurea ha svolto tirocinio presso il reparto di Psichiatria del Gemelli di Roma. Ha effettuato un corso post - laurea di Sessuologia presso l’Istituto Sessuologia Clinica di Roma della durata di quattro anni. E’ attualmente interessato alla problematica “genitori e adolescenti". E\' stato Docente nel progetto formativo della Nuova Sair nel campo della Comunicazione e ha partecipato per 6 mesi come sessuologo ad una trasmissione su radio Kiss Kiss. Attualmente esercita in libera professione presso il suo studio privato, dove si occupa prevalentemente di disfunzioni sessuali: impotenza, eiaculazione precoce, desiderio sessuale, ansia da prestazione. Il Dott. Del Monte è inoltre Socio Ordinario della S.E.O.R.',
            'Il Dott. si è laureato in odontoiatria e protesi dentaria nel 2007 presso l’Università degli studi di Bologna. Iscritto all’Albo provinciale degli Odontoiatri di Arezzo. Durante il suo percorso formativo ha seguito corsi e Master in Italia e all\'estero relativi in particolare a chirurgia e estetica dentale. Svolge attività lavorativa ad Arezzo e a Firenze offrendo collaborazioni multidisciplinari e specialistiche. Tra i suoi campi di interesse spicca l’odontoiatria estetica e la gestione dei disturbi temporo-mandibolari. Al di fuori del lavoro ama la montagna e i libri di viaggi',
            'Il Dottore si è laureato nel 2006 in Odontoiatria e Protesi Dentaria col massimo dei voti e lode presso l\'Università degli Studi di Firenze. E\' iscritto all\'Albo Provinciale degli Odontoiatri di Firenze (Ordine della Provincia di Firenze), dal 22/01/2007 con n. 1513. Dal 2007 ad oggi ha frequentato vari studi privati di Firenze e Provincia, dove si è sempre più specializzato nelle discipline di endodonzia e odontoiatria conservativa, che rappresentano a tutt\'oggi i suoi principali campi di impegno ed interesse. Negli anni successivi alla laurea e fino ad oggi ha cercato di ampliare costantemente, attraverso vari corsi, le sue conoscenze. Ancora prima delle nozioni tecniche, ritiene però fondamentale il rapporto umano col suo paziente. Dal Settembre 2011, pur mantenendo un certo numero di collaborazioni presso varie strutture private, ha iniziato l\'attività autonoma. Attualmente lavora in Viale Dei Mille 18 a Firenze',
            'Il Dottore consegue la laurea in Medicina e Chirurgia con lode nel luglio del 2000 presso l\'Università degli Studi di Pisa, dove nell\'ottobre del 2005 consegue la specializzazione in Chirurgia Vascolare. Negli anni successivi matura varie esperienze presso strutture pubbliche. Dal maggio 2000 a novembre 2003 presso la U.O. di Chirurgia Generale II dell’Ospedale S. Chiara di Pisa (Dir Prof. P Miccoli), Sez. di Chirurgia Vascolare, Scuola di Specializzazione in Chirurgia Vascolare (Dir. Prof GF Caldarelli); dal novembre 2003 all\'ottobre 2005 presso l\'U.O. di Chirurgia Vascolare dell’Ospedale di Cisanello di Pisa',
            'Il Dottore ha conseguito la Laurea di primo livello in fisioterapia, conseguita presso l\'Università degli studi di Parma nel 2003. Successivamente ha conseguito il Diploma di Osteopatia D.O. presso CSOT Roma. Dal 2003 ha partecipato a numerosi corsi di formazione utili ad ampliare e perfezionare tecniche e tematiche legate alla sua professione. Durante il percorso professionale ha svolto diversi tirocini presso importanti strutture a Palermo e Provincia come il Centro San Luca in Belmonte Mezzagno (Pa), ha collaborato con il Centro ARA Arcobaleno di riabilitazione domiciliare',
        ];

        $addresses = [
            'Via Cesare Battisti, 55, 10054 Boolville',
            'Via Carlo Alberto, 12, 10052 Boolville',
            'Via Aldo Moro, 1, 10054 Boolville',
            'Corso Giacomo Matteotti, 33, 10053 Boolville',
            'Piazza di Spagna, 115, 10050 Boolville',
            'Corso Torino, 312, 10054 Boolville',
            'Piazza Dante, 54, 10054 Boolville',
            'Viale dei Giardini, 98, 10052 Boolville',
            'Parco della Vittoria, 40, 10054 Boolville',
            'Via Giovanni da Procida, Ang. Vespri Siciliani, 89812 Pizzo Calabro',
        ];

        foreach ($doctors as $doctor) {
            $newDetail = new Detail;
            $newDetail->user_id = $doctor->id;
            // $newDetail->image = 'https://via.placeholder.com/150';

            for ($i = 0; $i < count($bios); $i++) {
                $newDetail->bio = $bios[array_rand($bios)];
            }

            for ($i = 0; $i < count($addresses); $i++) {
                $newDetail->address = $addresses[array_rand($addresses)];
            }
            // $newDetail->address = $faker->streetAddress();

            if (rand(0, 1)) {
                $newDetail->phone = $faker->phoneNumber();
            }
            
            $newDetail->save();
        }
    }
}
