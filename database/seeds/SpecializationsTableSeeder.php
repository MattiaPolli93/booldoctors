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
            "Allergy and immunology",
            "Anesthesiology",
            "Dermatology",
            "Diagnostic radiology",
            "Emergency medicine",
            "Family medicine",
            "Internal medicine",
            "Medical genetics",
            "Neurology",
            "Nuclear medicine",
            "Obstetrics and gynecology",
            "Ophthalmology",
            "Pathology",
            "Pediatrics",
            "Physical medicine and rehabilitation",
            "Preventive medicine",
            "Psychiatry",
            "Radiation oncology",
            "Surgery",
            "Urology"
        ];

        foreach ($specializations as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->specialization = $specialization;
            $newSpecialization->save();
        }
    }
}
