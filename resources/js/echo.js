import Echo from 'laravel-echo';

import Pusher from 'pusher-js';

window.Pusher = Pusher;

if (import.meta.env.VITE_BROADCAST_CONNECTION === 'reverb' && import.meta.env.VITE_BROADCAST_DRIVER === 'reverb' ) {
    window.Reverb = new Echo({
        broadcaster: 'reverb',
        key: import.meta.env.VITE_REVERB_APP_KEY,
        wsHost: import.meta.env.VITE_REVERB_HOST.replace(/https?:\/\//, ''),
        wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
        wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
        forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
        enabledTransports: ['ws', 'wss'],
    });
} else {
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: import.meta.env.VITE_PUSHER_APP_KEY,
        cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
        forceTLS: true
    });
}