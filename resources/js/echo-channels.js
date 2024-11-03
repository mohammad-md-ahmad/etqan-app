Echo.channel('new-follower')
        .listen('new-follower-event', (e) => {
            console.log('event', e);
            alert(e.message)
        });
