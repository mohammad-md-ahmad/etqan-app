window.Echo.private(`${import.meta.env.VITE_NEW_FOLLOWER_BROADCAST_CHANNEL}.${window.authUserId}`).listen(`.${import.meta.env.VITE_NEW_FOLLOWER_BROADCAST_EVENT}`, (data) => {
    console.log(data);
});
