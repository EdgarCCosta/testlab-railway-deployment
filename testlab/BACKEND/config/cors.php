<?php

return [

    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://testlabfrontend-production.up.railway.app',
    ],

    'allowed_headers' => ['*'],

    'supports_credentials' => false,
];
