<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

    'allowed_origins' => ['https://tepern.github.io'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['X-Api-Factory-Application-Id', 'Content-Type', 'Authorization', 'Accept'],

    'exposed_headers' => ['Authorization', 'X-Api-Factory-Application-Id', 'Accept'],

    'max_age' => 0,

    'supports_credentials' => true,

];
