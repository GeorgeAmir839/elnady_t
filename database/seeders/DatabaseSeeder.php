<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\LevelsSeeder;
use Database\Seeders\StudentsSeeder;
use Database\Seeders\GradeItemsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        $this->call([
            GradeItemsSeeder::class,
            LevelsSeeder::class,
            StudentsSeeder::class,
        ]);
    }
}
