<?php

return [
    'master_key' => env('PAYDUNYA_MASTER_KEY'),
    'private_key' => env('PAYDUNYA_PRIVATE_KEY'),
    'public_key' => env('PAYDUNYA_PUBLIC_KEY'),
    'token' => env('PAYDUNYA_TOKEN'),

    'mode' => env('PAYDUNYA_MODE', 'live'), // Peut être 'test' ou 'live'

    // Infos sur ton entreprise
    // 'company_name' => env('PAYDUNYA_COMPANY_NAME', 'Nom de ton entreprise'),
    // 'company_logo' => env('PAYDUNYA_COMPANY_LOGO', 'URL du logo'),
    // 'company_url' => env('PAYDUNYA_COMPANY_URL', 'URL du site web'),
];
