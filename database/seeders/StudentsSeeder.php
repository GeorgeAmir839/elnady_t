<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeItemsIds = \App\Models\GradeItem::pluck('id')->toArray();
        $students = \App\Models\Student::factory(50)->create();
        $courses = \App\Models\Course::factory(10)->create();
        foreach ($courses as $course) {
            $randomGradeItemIds = Arr::random($gradeItemsIds, rand(2, 4));
            $course->gradeItems()->attach($randomGradeItemIds);
            $course->students()->attach($students->random(rand(5, 12))->pluck('id'));
            foreach ($course->students as $student) {
                foreach ($course->gradeItems as $gradeItem) {
                    $randomDegree = rand($gradeItem->max_degree / 2, $gradeItem->max_degree);
                    $student->gradeItems()->attach($student->id, [
                        'grade_item_id' => $gradeItem->id,
                        'grade' => $randomDegree,
                    ]);
                }
            }
        }
        
    }
}
