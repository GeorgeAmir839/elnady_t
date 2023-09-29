<form id="updateForm" data-id="{{ $student->id }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="full_name" class="form-control" value="{{ $student->full_name }}" placeholder="example">
        <span id="nameError" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" disabled name="email" value="{{ $student->email }}" class="form-control"
            placeholder="name@example.com">
        <span id="emailError" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label class="form-label">Birth date</label>
        <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" class="form-control"
            min="2015-01-01" placeholder="12/7/2021">
        <span id="birthError" class="text-danger"></span>
    </div>
    <div class="mb-3">

        <label class="form-label">Level</label>

        <select class="form-select sort" id="inputGroupSelect04" name="level_id"
            aria-label="Example select with button addon">
            @foreach ($levels as $item)
                {{-- @if (in_array($selectItem->id, $teams_ids)) selected @endif  --}}
                <option @if ($student->level->id == $item->id) selected @endif value="{{ $item->id }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="mb-3">

        <label class="form-label">Course</label>

        <select class="form-select sort" multiple id="inputGroupSelect04" name="courses[]"
            aria-label="Example select with button addon">
            @foreach ($courses as $item)
                <option @if (in_array($item->id, $courses_ids)) selected @endif value="{{ $item->id }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>
<script>
 $('#updateForm').on('submit', function(e) {
    e.preventDefault();
    var form = $(this).serialize();
    var taskId = $(this).data('id');
    let url = "{{ route('students.update', ':id') }}";

    url = url.replace(':id', taskId);

    $.ajax({
        url: url,
        type: "PUT",
        data: form, // Serialize the form data
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dataType: 'JSON',
        success: function(response) {
            $('#create_lg_modal').modal('hide');
            window.location.reload();
        },
        error: function(response) {
            $('#nameError').text(response.responseJSON.errors.full_name);
            $('#emailError').text(response.responseJSON.errors.email);
            $('#birthError').text(response.responseJSON.errors.date_of_birth);
        },
    });
});
</script>
