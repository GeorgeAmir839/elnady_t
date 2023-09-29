<form method="post" action="{{ route('store.manage.students',$course->id) }}">
    @csrf



    <div class="mb-3">

        <label for="exampleFormControlInput1" class="form-label">Course</label>

        <select class="form-select sort" multiple id="inputGroupSelect04" name="students[]"
            aria-label="Example select with button addon">
            <option value="">{{ trans('Select ...') }}</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}" {{ in_array($student->id, $students_ids) ? 'selected' : '' }}>
                    {{ 'Name: ' . $student->full_name . ' - Code: ' . $student->code }}
                </option>
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
