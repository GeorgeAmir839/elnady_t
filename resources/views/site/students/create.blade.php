<form id="storeForm">
    @csrf

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
        <input type="text" name="full_name" class="form-control" id="exampleFormControlInput1" placeholder="example">
        @error('name')
            <span class="text-danger">{{ trans($message) }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
            placeholder="name@example.com">
        @error('email')
            <span class="text-danger">{{ trans($message) }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
        <input type="date" name="date_of_birth" class="form-control" id="exampleFormControlInput1"
            placeholder="example">
        @error('date_of_birth')
            <span class="text-danger">{{ trans($message) }}</span>
        @enderror
    </div>
    <div class="mb-3">

        <label for="exampleFormControlInput1" class="form-label">Level</label>

        <select class="form-select sort" id="inputGroupSelect04" name="level_id"
            aria-label="Example select with button addon">
            @foreach ($levels as $item)
                {{-- @if (in_array($selectItem->id, $teams_ids)) selected @endif  --}}
                <option value="{{ $item->id }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="mb-3">

        <label for="exampleFormControlInput1" class="form-label">Course</label>

        <select class="form-select sort" multiple id="inputGroupSelect04" name="courses[]"
            aria-label="Example select with button addon">
                        <option value="">{{ trans('Select ...') }}</option>

            @foreach ($courses as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
<script>
    $('#storeForm').on('submit', function(e) {
        e.preventDefault();


        $.ajax({
            url: "{{ route('students.store') }}",
            type: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $('#create_lg_modal').modal('hide');
                toastr.success(response.success);
            },
            error: function(response) {
                // $('#nameError').text(response.responseJSON.errors.name);
                var html = '<ul>';
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function(key, val) {
                        html += "<li>" + val + "</li>";
                    });
                } else {
                    html += "<li>" + response.responseJSON.message + "</li>";
                }

                html += "</ul>";
                $('.error_from_ajax').removeClass('d-none').html(html);
            },
        });
    });
</script>