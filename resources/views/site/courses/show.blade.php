@extends('site.layout.app')

@section('css')
    <div class="card m-5">
        <div class="card-header row m-5">

            <h1 class="text-center">course details</h1>
            <div class="text-left">
                <div class="row align-items-center p-0 m-0">
                  
        
                    <div class="col text-right">
                        <a type="button" href="{{ route('manage.students',$course->id) }}" class="btn btn-primary create_lg_modal btn-sm"
                            data-bs-toggle="modal" data-bs-target="#create_lg_modal">
                            Manage students in course
                        </a>
                    </div>
                </div>
            </div>
            <div class=" text-md-left m-5">
                <h5 class="mb-md-0 h5">Name: {{ $course->name }}</h5>
                <div class="mt-2">
                    <span class="me-5">Code: {{ $course->code }} </span>
                    <span class="me-5"> </span>
                    <span class="me-5">Created At: {{ $course->created_at }} </span>
                </div>
            </div>
            <h1>Exams</h1>
            <div class="mb-3">
                @foreach ($course->gradeItems as $gradeItem)
                    <span class="me-5">Name: {{ $gradeItem->name }} </span>
                    <span class="me-5">Max Degree: {{ $gradeItem->max_degree }} </span>
                    <br>
                @endforeach
            </div>

            {{-- Check if there are students --}}
            @if ($course->students)
                <h1>Students</h1>
                <div class="">
                    <table class="table table-striped students_table">
                        <thead>
                            <tr class="align-text-top">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th class="col">Code</th>
                                @foreach ($course->gradeItems as $gradeItem)
                                    <th scope="col">
                                        <p class="m-0 p-0">{{ $gradeItem->name }}</p>
                                        <p p class="m-0 p-0">{{ '(MAX ' . $gradeItem->max_degree . ')' }}</p>
                                    </th>
                                @endforeach
                                <th class="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->students as $key => $student)
                                <tr class="align-items-center">
                                    @php
                                        $totalScore = 0;
                                    @endphp
                                    <th scope="row">{{ $key + 1 }}</th>
                                    {{-- contenteditable="true" --}}
                                    <td class="editable">
                                        {{ $student->full_name }}

                                    </td>
                                    <td class="editable">
                                        {{ $student->code }}

                                    </td>
                                    @foreach ($course->gradeItems as $gradeItem)
                                        <td class="editable">
                                            @php
                                                $degree = $student->gradeItems->where('id', $gradeItem->id)->first();
                                                $totalScore += $degree ? $degree->pivot->grade : 0;
                                            @endphp
                                            {{ $student->gradeItems->where('id', $gradeItem->id)->first()->pivot->grade ?? 'Not tested yet' }}

                                        </td>
                                    @endforeach

                                    <td class="editable">
                                        {{ $totalScore }}

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            @endif

        </div>
    </div>
@endsection
