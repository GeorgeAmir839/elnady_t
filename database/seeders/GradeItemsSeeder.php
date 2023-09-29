<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeItems = [
            ['name' => 'Practical Exam', 'max_degree' => 100],
            ['name' => 'Oral Exam', 'max_degree' => 50],
            ['name' => 'Midterm Exam', 'max_degree' => 75],
            ['name' => 'Final Exam', 'max_degree' => 100],
        ];

        DB::table('grade_items')->insert($gradeItems);
    }
}
