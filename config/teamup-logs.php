<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Centralized Log Links
    |--------------------------------------------------------------------------
    |
    | The api links to send the mapped logs.
    |
    */

    'api_link' => env('ACCOUNTS_LOG_API_LINK', 'https://logger-prd.dev.teamup.lk/loki/api/v1/push'),

    /*
    |--------------------------------------------------------------------------
    | Logging Credentials
    |--------------------------------------------------------------------------
    |
    | The credentials to access the centralized logging 
    |
    */

    'username' => env('ACCOUNTS_LOG_USERNAME'),
    'password' => env('ACCOUNTS_LOG_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | App Details
    |--------------------------------------------------------------------------
    |
    | The relevant app details to be stored in the centralized logs
    |
    */

    'app_name' => env('APP_NAME'),
    'app_stage' => env('APP_STAGE', 'uat'),
];
