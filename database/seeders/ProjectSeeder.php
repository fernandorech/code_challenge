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
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(4),
            ]);
        }
    }
}
