$(document).ready(function () {

    $('#follow-user-btn').on('click', function (e) {
        e.preventDefault();

        const username = $(this).data('username');
        const isFollowing = $(this).data('is-following');

        toggleFollowUser(e, username, isFollowing);
    });

    function toggleFollowUser(e, username, isFollowing) {
        $.ajax({
            'url': `/user/${username}/follow`,
            'method': 'POST',
            success: function (response) {
                if (isFollowing) {
                    $('#follow-user-btn').text('Follow').data('is-following', false);
                } else {
                    $('#follow-user-btn').text('Unfollow').data('is-following', true);
                }
            },
            error: function (error) {

            }
        });
    }
});
