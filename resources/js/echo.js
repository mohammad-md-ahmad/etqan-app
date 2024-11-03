import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    // key: import.meta.env.MIX_PUSHER_APP_KEY,
    // // wsHost: import.meta.env.VITE_REVERB_HOST,
    // // wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    // // wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    // // forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    // // enabledTransports: ['ws', 'wss'],
    // cluster: import.meta.env.PUSHER_APP_CLUSTER,
    // forceTLS: true,
    // // auth: {
    // //     headers: {
    // //         Authorization: 'Bearer ' + token
    // //     }
    // // },
    // namespace: 'App.Events',
    // encrypted: true,
    key: '686ebbee59eadcde1c0d',
    cluster: 'ap2',
    wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-ap2.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
});
