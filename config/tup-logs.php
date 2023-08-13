<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Use default rabbitmq
    |--------------------------------------------------------------------------
    |
    | Use the default rabbitmq credentials or use custom rabbitmq endpoint
    |
    */

    'use_default' => env('LOG_USE_APP_RABBITMQ', true),

    /*
    |--------------------------------------------------------------------------
    | Logging Credentials for RabbitMQ
    |--------------------------------------------------------------------------
    |
    | The credentials to access the centralized logging 
    |
    */

    'host' => env('LOG_RABBITMQ_HOST', 'dev.rabbitmq.com'),
    'port' => env('LOG_RABBITMQ_PORT', 5672),
    'username' => env('LOG_RABBITMQ_USERNAME', ''),
    'password' => env('LOG_RABBITMQ_PASSWORD', ''),

    /*
    |--------------------------------------------------------------------------
    | App Details
    |--------------------------------------------------------------------------
    |
    | The relevant app details to be stored in the centralized logs
    |
    */

    'app_name' => env('APP_NAME'),
    'app_stage' => env('APP_ENV'),
];
