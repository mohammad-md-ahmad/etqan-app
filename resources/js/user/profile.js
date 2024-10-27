$(document).ready(function () {

    $('#follow-user-btn').on('click', function (e) {
        e.preventDefault();

        const username = $(this).data('username');
        toggleFollowUser(e, username);
    });

    function toggleFollowUser(e, username) {
        $.ajax({
            'url': `/user/${username}/follow`,
            'method': 'POST',
            'data': {

            },
            success: function (response) {
                console.log(response);
            },
            error: function (error) {

            }
        });
    }
});
