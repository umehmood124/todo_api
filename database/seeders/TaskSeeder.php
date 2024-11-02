<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Task;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Define the number of tasks you want to create
        $numberOfTasks = 10;

        for ($i = 0; $i < $numberOfTasks; $i++) {
            Task::create([
                'task' => $faker->sentence($nbWords = 2, $variableNbWords = true),  // Generate a random sentence
                'description' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true)  // Generate a random paragraph
            ]);
        }
    }
}
