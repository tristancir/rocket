<?php
return [
    'rocket' => [
        'client_id' => env('DISCORD_ROCKET_CLIENT_ID'),
        'client_secret' => env('DISCORD_ROCKET_CLIENT_SECRET'),
        'bot_token' => env('DISCORD_ROCKET_BOT_TOKEN'),
        'authorize_url' => env('DISCORD_ROCKET_AUTHORIZE_URL'),
        'permissions' => env('DISCORD_ROCKET_PERMISSIONS'),
        'scope' => env('DISCORD_ROCKET_SCOPE')
    ],
    'authorize_url' => 'https://discord.com/api/oauth2/authorize',
    'token_url' => 'https://discord.com/api/oauth2/token',
    'revoke_url' => 'https://discord.com/api/oauth2/token/revoke'
];