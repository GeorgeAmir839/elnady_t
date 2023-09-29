<script src="{{ asset('assets/site/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}

<script>
$('body').on('click', '.create_lg_modal', function(event) {
        event.preventDefault();
        var url, targetModal;
        url = $(this).attr('href');
        targetModal = $('#create_lg_modal');

        $.ajax({
            method: 'GET',
            url: url,
            beforeSend: function() {
                // addLoader();
            },
            success: function(data) {
                targetModal.find('#staticBackdropLabel').text(data.title);
                targetModal.find('.modal-body').html(data.view);
               
              
            },
            error: function() {

            }
        });

        // Show modal
        targetModal.modal();
    });
</script>
@yield('js')
