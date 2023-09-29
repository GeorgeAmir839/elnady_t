@extends('site.layout.app')

@section('css')
    <style>
        .relative.z-0.inline-flex.shadow-sm.rounded-md {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="text-left">
        <div class="row align-items-center p-0 m-0">
            <div class="col-auto">
                <h1 class="h3">{{ trans('All Students') }}</h1>
            </div>


            <div class="col text-right">
                <a type="button" href="{{ route('students.create') }}" class="btn btn-primary create_lg_modal btn-sm"
                    data-bs-toggle="modal" data-bs-target="#create_lg_modal">
                    Add Student
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header px-5 py-3">

            <div class="input-group mb-3">


                <select class="form-select sort" id="inputGroupSelect04" name="level"
                    aria-label="Example select with button addon">
                    <option value="">{{ trans('Select level ...') }}</option>
                    @foreach ($levels as $key => $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>

            </div>

            <form action="{{ route('students.index') }}" method="GET">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" id="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type name or code or email & Enter">
                </div>
            </form>

        </div>
        <div class="card-body p-5" id="student-list">
            @include('site.students.table')
            <div class="aiz-pagination">
                {{ $students->links() }}
            </div>
        </div>

    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            // Listen for change event on the select element
            $('#inputGroupSelect04').change(function() {
                var selectedLevel = $(this).val();

                // Make an AJAX request to fetch filtered students
                $.ajax({
                    url: "{{ route('filter.students') }}",
                    type: "GET",
                    data: {
                        level_id: selectedLevel
                    },
                    success: function(data) {
                        // Update the student list with the received data
                        $('#student-list').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
