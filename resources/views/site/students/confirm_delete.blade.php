
            <h5 class="m-5">HI {{ $student->full_name }} are you sure u need to delete your account</h5>
           
<div class="modal-footer">
    <button type="button" class="btn btn-sm  btn-secondary" data-bs-dismiss="modal">Close</button>

    <button class="btn btn-danger btn-sm delete" data-id="{{ $student['id'] }}">Confirm
        delete</button>
</div>
<script>
    $(document).ready(function() {
        $('.delete').click(function() {
            var taskId = $(this).data('id');
            let url = "{{ route('students.destroy', ':id') }}";

            url = url.replace(':id', taskId);
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                   
                    window.location.reload();
                },
                error: function() {
                    alert('An error occurred while deleting the task.');
                }
            });
        });


    });
</script>
