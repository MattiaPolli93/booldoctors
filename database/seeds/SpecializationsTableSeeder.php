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
            "Chirurgia",
            "Dermatologia",
            "Medicina fisica e riabilitativa",
            "Medicina generale",
            "Medicina interna",
            "Medicina preventiva",
            "Neurologia",
            "Oncologia",
            "Ostetricia e ginecologia",
            "Pediatria",
            "Psichiatria",
            "Urologia"
        ];

        foreach ($specializations as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->specialization = $specialization;
            $newSpecialization->save();
        }
    }
}
