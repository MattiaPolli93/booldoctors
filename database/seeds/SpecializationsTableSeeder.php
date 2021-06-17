<?php

use App\Specialization;
use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            "Allergologia e immunologia",
            "Anestesia",
            "Chirurgia",
            "Dermatologia",
            "Genetica medica",
            "Medicina d'emergenza",
            "Medicina fisica e riabilitativa",
            "Medicina generale",
            "Medicina nucleare",
            "Medicina interna",
            "Medicina preventiva",
            "Neurologia",
            "Oftalmologia",
            "Oncologia",
            "Ostetricia e ginecologia",
            "Patologia",
            "Pediatria",
            "Psichiatria",
            "Radiologia",
            "Urologia"
        ];

        foreach ($specializations as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->specialization = $specialization;
            $newSpecialization->save();
        }
    }
}
