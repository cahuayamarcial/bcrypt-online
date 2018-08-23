<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     => '1481309175418038',
        'client_secret' => 'ec445cbf1a0f67cc034ee9f8301769f2',
        'redirect'      => 'https://bcrypt-online.xyz/login/facebook/callback',
    ],

    'google' => [
        'client_id'     => '216487119622-q3qdtpnkoooe7tcvvalldto5eotei5ce.apps.googleusercontent.com',
        'client_secret' => 'whnP4Qo3ixFkFvt89_TLF_G2',
        'redirect'      => 'https://bcrypt-online.xyz/login/google/callback',
    ],

];
