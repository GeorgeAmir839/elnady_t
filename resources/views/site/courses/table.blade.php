<table class="table table-striped students_table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th class="text-right">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $key => $item)
            <tr class="align-items-center" data-item-id="{{ $item['id'] }}">
                <th scope="row">{{ $key + 1 }}</th>
                {{-- contenteditable="true" --}}
                <td width="55%" class="editable" data-item-id="{{ $item['id'] }}" >
                    {{ $item['name'] }}

                </td>
                <td width="55%" class="editable" data-item-id="{{ $item['id'] }}" >
                    {{ $item['code'] }}

                </td>
               
                <td class="text-left row ">
                    
                    <div class="col">
                        <a class="btn btn-success  btn-sm"
                            href="{{ route('courses.show', ['course' => $item['id']]) }}">
                            course details
                        </a>

                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
