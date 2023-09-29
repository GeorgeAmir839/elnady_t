<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStusentRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $sort_search = null;
        $students = Student::orderBy('id', 'desc');

        if ($request->has('search')) {
            $sort_search = $request->search;
            $students = Student::where('full_name', 'like', '%' . $sort_search . '%')->orWhere('email', 'like', '%' . $sort_search . '%')->orWhere('code', 'like', '%' . $sort_search . '%');
        }

        $levels =  Level::all();
        $students = $students->paginate(10);
        return view('site.students.index', compact('students', 'levels', 'sort_search'));
    }
    public function filterStudents(Request $request)
    {
        $levelId = $request->input('level_id');

        // Query students based on the selected level
        $students = Student::where('level_id', $levelId)->get();
        return view('site.students.table', compact('students'));
    }
    public function create()
    {
        $levels =  Level::all();
        $courses =  Course::all();
        return response([
            'title' => 'Create Student',
            'view' => view('site.students.create', compact('levels', 'courses'))->render(),
        ]);
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

        return response()->json([
            'success' => 'Successfully',
        ]);
    }


    public function show($id)
    {

        $student = Student::find($id);
        return response([
            'title' => 'Show Student',
            'view' => view('site.students.show', compact('student'))->render(),
        ]);
    }
    public function edit($id)
    {

        $student = Student::find($id);
        $levels =  Level::all();
        $courses =  Course::all();
        $courses_ids  = $student->courses->pluck('id')->toArray();
        return response([
            'title' => 'Update Student',
            'view' => view('site.students.edit', compact('student', 'levels', 'courses', 'courses_ids'))->render(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->except('courses'));
        if ($request->has('courses')) {
            $student->courses()->sync($request->courses);
        }
        return response()->json([
            'success' => 'Successfully',
        ]);
    }

    public function confirmDelete($id)
    {

        $student = Student::find($id);
        return response([
            'title' => 'Confirm delete',
            'view' => view('site.students.confirm_delete', compact('student'))->render(),
        ]);
    }
    public function destroy($id)
    {

        $student = Student::find($id);
        $student->delete();
    }
}
