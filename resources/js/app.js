import './bootstrap';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
})

$('#logout-link').on('click', function(e) {
    e.preventDefault();

    $.ajax({
        url: '/auth/logout',
        type: 'POST',
        success: function (response) {
            location.reload();
        }
    });
})
