<?php

namespace Tests\Unit;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function testStudentDelete()
    {
        $student1 = Student::factory()->create();
        $studentId = $student1->id;

        $student1->delete();

        $this->assertDatabaseMissing('students', ['id' => $studentId]);
    }

    public function testStudentIndex()
    {
        $response = $this->get('/students');
    
    
        $this->assertTrue(true);
    }
    public function testStudentCreate()
    {
        $response = $this->get('/students/create');
       $response->assertStatus(200);
    }
    public function testStudentShow()
    {
         $response= $this->get('/students/1');
         $response->assertTrue(true);
    }
}