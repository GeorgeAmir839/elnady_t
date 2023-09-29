<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $data['sort_search'] = null;
        $courses = Course::orderBy('id', 'desc');
       
        if ($request->has('search')) {
            $sort_search = $request->search;
            $courses = Course::where('name', 'like', '%' . $sort_search . '%')->orWhere('code', 'like', '%' . $sort_search . '%');
          
        }

        $data['courses'] = $courses->get();
        return $this->apiResponse($data, 'Courses data get successfully', 200);
    }
    public function manageStudents($id)
    {
        $data = array();
        $data['students'] =  Student::all();
        $data['course'] = Course::find($id);
        $data['students_ids']  = $data['course']->students->pluck('id')->toArray();
        return $this->apiResponse($data, 'successfully', 200);
        
    }
    
    public function storeManageStudents(Request $request,$id)
    {
        $course = Course::find($id);
        if ($request->has('students')) {
            $course->students()->sync($request->students);
        }
        
        return $this->apiResponse(null, 'data saved successfully', 200);
    }
    public function show($id)
    {
        $course = Course::find($id);
        return $this->apiResponse($course, 'Course details', 200);
    }
}
