<?php

namespace Database\Seeders;

use App\Models\Task;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Seed two tasks
        for ($i = 0; $i < 2; $i++) {
            Task::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => $faker->randomElement(['done', 'not_done']),
                
            ]);
        }
    }
}
