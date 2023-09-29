@extends('site.layout.app')

@section('css')
    <style>
        .relative.z-0.inline-flex.shadow-sm.rounded-md {
            display: none;
        }
    </style>
@endsection
@section('content')
    

    <div class="card ">
        <div class="card-header px-5 py-3">

           

            <form action="{{ route('courses.index') }}" method="GET">

                <div class="input-group mb-3 mt-5">
                    <input type="text" class="form-control" name="search" id="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type name or code  & Enter">
                </div>
            </form>

        </div>
        <div class="card-body p-5" id="student-list">
            @include('site.courses.table')
            <div class="aiz-pagination">
                {{ $courses->links() }}
            </div>
        </div>

    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
         
        });
    </script>
@endsection
