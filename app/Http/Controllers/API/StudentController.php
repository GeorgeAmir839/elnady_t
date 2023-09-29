<?php

namespace App\Http\Controllers\API;

use App\Models\Level;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStusentRequest;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $data = array();
        $data['sort_search'] = null;
        $students = Student::orderBy('id', 'desc');

        if ($request->has('search')) {
            $sort_search = $request->search;
            $students = Student::where('full_name', 'like', '%' . $sort_search . '%')->orWhere('email', 'like', '%' . $sort_search . '%')->orWhere('code', 'like', '%' . $sort_search . '%');
        }

        $data['levels'] =  Level::all();
        $data['students'] = $students->get();

        return $this->apiResponse($data, 'Stusents data get successfully', 200);
    }
    public function filterStudents(Request $request)
    {
        $levelId = $request->input('level_id');
        $data['students'] = Student::where('level_id', $levelId)->get();
        return $this->apiResponse($data, 'filter successfully', 200);
    }
    public function create()
    {
        $data['levels'] =  Level::all();
        $data['courses'] =  Course::all();
        return $this->apiResponse($data, 'Student creation page data', 200);
    }
    public function store(StoreStusentRequest $request)
    {
        $request->merge([
            'code' => uniqid(),
        ]);
        $student = Student::create($request->except('courses'));
        if ($request->has('courses')) {
            $student->courses()->attach($request->courses);
        }

        $student->load(['courses', 'gradeItems', 'level']);
        return $this->apiResponse($student, 'Student saved successfully', 200);
    }


    public function show($id)
    {

        $student = Student::find($id);
        return $this->apiResponse($student, 'Student details', 200);
    }
    public function edit($id)
    {

        $data['student'] = Student::find($id);
        $data['levels'] =  Level::all();
        $data['courses'] =  Course::all();
        $data['courses_ids']  = $data['student']->courses->pluck('id')->toArray();
        return $this->apiResponse($data, 'Student details', 200);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->except('courses'));
        if ($request->has('courses')) {
            $student->courses()->sync($request->courses);
        }
        return $this->apiResponse(null, 'data saved successfully', 200);
    }
    public function destroy($id)
    {

        $student = Student::find($id);
        $student->delete();
        return $this->apiResponse(null, 'delete successfully', 200);
    }
}
