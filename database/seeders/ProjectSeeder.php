<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Project::create([
                'name' => $faker->sentence(3), // Nome com 3 palavras
                'description' => $faker->paragraph(4), // Descrição com 4 frases
            ]);
        }
    }
}
