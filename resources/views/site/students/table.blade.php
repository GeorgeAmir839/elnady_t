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
                <td  class="editable" data-item-id="{{ $item['id'] }}" >
                    {{ $item['full_name'] }}

                </td>
                <td class="editable" data-item-id="{{ $item['id'] }}" >
                    {{ $item->level->name }}

                </td>
                <td  class="editable" data-item-id="{{ $item['id'] }}" >
                    {{ $item['code'] }}

                </td>
                <td class=" row ">
                    <div class="col-6">
                        <button class="btn btn-secondary cancel-edit {{ 'cancel-edit' . $item['id'] }} d-none"
                            data-id="{{ $item['id'] }}">X</button>
                        <button class="btn btn-primary save-item {{ 'save-item' . $item['id'] }} d-none"
                            data-id="{{ $item['id'] }}">Edit</button>

                    </div>
                    <div class="col-6">
                        {{-- <a class="btn btn-success  btn-sm"
                            href="{{ route('items.show', ['item' => $item['id']]) }}">
                            show
                        </a> --}}

                        <button class="btn btn-danger btn-sm delete-item"
                            data-id="{{ $item['id'] }}">Delete</button>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
