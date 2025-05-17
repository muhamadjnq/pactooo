<?php

return [
    'api_key' => env('COINREMITTER_API_KEY'),
    'password' => env('COINREMITTER_SECRET_KEY'),
    'wallets' => [
        'BNB' => env('COINREMITTER_WALLET_BNB'),
    ],
];
