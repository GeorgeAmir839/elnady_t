<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $sort_search = null;
        $courses = Course::orderBy('id', 'desc');
       
        if ($request->has('search')) {
            $sort_search = $request->search;
            $courses = Course::where('name', 'like', '%' . $sort_search . '%')->orWhere('code', 'like', '%' . $sort_search . '%');
          
        }

        $courses = $courses->paginate(10);
        return view('site.courses.index', compact('courses','sort_search'));
    }
    public function manageStudents($id)
    {
        $students =  Student::all();
        $course = Course::find($id);
        $students_ids  = $course->students->pluck('id')->toArray();
        return response([
            'title' => 'Create Student',
            'view' => view('site.courses.manage_students', compact('students','course','students_ids'))->render(),
        ]);
    }
    public function show($id)
    {
        
        $course = Course::find($id);
        // dd( $item->students);
        return view('site.courses.show',compact('course'));
    }
}
