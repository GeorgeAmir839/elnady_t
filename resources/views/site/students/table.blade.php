<table class="table table-striped students_table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Level</th>
            <th class="col">Code</th>
            <th class="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $key => $item)
            <tr class="align-items-center" data-item-id="{{ $item['id'] }}">
                <th scope="row">{{ $key + 1 }}</th>
                {{-- contenteditable="true" --}}
                <td class="editable" data-item-id="{{ $item['id'] }}">
                    {{ $item['full_name'] }}

                </td>
                <td class="editable" data-item-id="{{ $item['id'] }}">
                    {{ $item->level->name }}

                </td>
                <td class="editable" data-item-id="{{ $item['id'] }}">
                    {{ $item['code'] }}

                </td>
                <td class=" row ">
                    <div class="col">

                        <a class="btn btn-success create_lg_modal btn-sm" data-bs-toggle="modal"
                            data-bs-target="#create_lg_modal" href="{{ route('students.show', $item['id']) }}">
                            show
                        </a>
                        <a class="btn btn-primary create_lg_modal btn-sm" data-bs-toggle="modal"
                            data-bs-target="#create_lg_modal" href="{{ route('students.edit', $item['id']) }}">
                            Edit
                        </a>
                        <a class="btn btn-danger create_lg_modal btn-sm" data-bs-toggle="modal"
                            data-bs-target="#create_lg_modal" href="{{ route('confirmDelete', $item['id']) }}">
                            delete
                        </a>

                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
