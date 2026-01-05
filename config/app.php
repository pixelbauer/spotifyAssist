<?php

declare(strict_types=1);

return [
    'name' => getenv('APP_NAME') ?: 'Spotify Assist',
    'env' => getenv('APP_ENV') ?: 'development',
    'debug' => getenv('APP_DEBUG') === 'true',
    'url' => getenv('APP_URL') ?: 'http://localhost:8080',

    'spotify' => [
        'client_id' => getenv('SPOTIFY_CLIENT_ID') ?: '',
        'client_secret' => getenv('SPOTIFY_CLIENT_SECRET') ?: '',
        'redirect_uri' => getenv('SPOTIFY_REDIRECT_URI') ?: 'http://localhost:8080/spotify/callback',
    ],
];
