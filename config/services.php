<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [

        'client_id' => '255436408666-e89cb87q6a2damdba95i929tie0shshm.apps.googleusercontent.com',
        'client_secret' => 'S9f_o_uBIXOZ9wy6HT26tE02',
        'redirect' => 'http://localhost/faceGram/callback/google',

    ],
    'facebook' => [
        'client_id' => '720391618491358',
        'client_secret' => '92b770eb80222e02aaa404079ba2cf8f',
        'redirect' => 'http://localhost/faceGram/callback/facebook',
      ], 
      'github' => [
        'client_id' => 'b680aafada0704f86868',
        'client_secret' => '9622d68dcbbe8873fdcd66662064c9d8592bf883',
        'redirect' => 'http://localhost/faceGram/callback/github',
      ],

];