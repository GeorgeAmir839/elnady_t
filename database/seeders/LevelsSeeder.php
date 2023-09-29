<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['name' => 'Level1', 'number' => '50', 'description' => 'Description for Level1'],
            ['name' => 'Level2', 'number' => '60', 'description' => 'Description for Level2'],
            ['name' => 'Level3', 'number' => '70', 'description' => 'Description for Level3'],
            ['name' => 'Level4', 'number' => '80', 'description' => 'Description for Level4'],
        ];

        DB::table('levels')->insert($levels);
    }
}
