$(document).ready(function() {
    $('#submit').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/auth/signup',
            type: 'POST',
            datatype: 'json',
            data: $('#signup-form').serialize(),
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                const jsonResponse = JSON.parse(xhr.responseText);

                const errorMessages = jsonResponse.errors;

                let html = '<ul>';

                $.each(errorMessages, function (index, val) {
                    console.log(val)
                    html += '<li class="list-disc">' + val[0] + '</li>';
                });

                html += '</ul>';

                $('#error-messages-container').html(html);
                $('body').scrollTo('#error-messages-container');
            }
        });
    })
})
