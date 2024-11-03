import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import $ from "jquery";
window.$ = $;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

// import './echo';
// import './pusher';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '686ebbee59eadcde1c0d',
    cluster: 'ap2',
    // forceTLS: true
});
var pusher = new Pusher('686ebbee59eadcde1c0d', {
    cluster: 'ap2'
});
var channel = pusher.subscribe('new-follower');
channel.bind('new-follower-event', function (e) {
    console.log('eventano', e);
    alert(e.message);
});
