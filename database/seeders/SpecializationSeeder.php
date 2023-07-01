<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            'Cardiologia',
            'Dermatologia',
            'Ortopedia',
            'Gastroenterologia',
            'Oncologia',
            'Otorinolaringoiatria',
            'Neurologia',
            'Pediatria',
            'Psicologia',
            'Chirurgia'
        ];

        foreach ($specializations as $specialization) {
            Specialization::create(['name' => $specialization]);
        }
    }
}
