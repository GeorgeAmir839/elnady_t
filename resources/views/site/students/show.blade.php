@extends('site.layout.app')

@section('css')
<div class="card m-5">
    <div class="card-header row m-5">
        <div class="text-center text-md-left m-5">
            <h5 class="mb-md-0 h5">Name: {{ $student->full_name }}</h5>
           <div class="mt-2">
            <span class="ml-2">Code: {{ $student->code }} </span>
            <span class="ml-2"> </span>
            <span class="ml-2">level: {{ $student->level->name }} </span>
           </div>
        </div>
    </div>
</div>
@endsection