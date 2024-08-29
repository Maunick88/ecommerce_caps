<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

 return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Configura el modo desde .env
    'sandbox' => [
        'client_id'         => env('PAYPAL_CLIENT_ID'), // Client ID del entorno sandbox
        'client_secret'     => env('PAYPAL_CLIENT_SECRET'), // Client Secret del entorno sandbox
        'app_id'            => '', // Este campo puede estar vacío
    ],
    'live' => [
        'client_id'         => env('PAYPAL_CLIENT_ID'), // Client ID del entorno live
        'client_secret'     => env('PAYPAL_CLIENT_SECRET'), // Client Secret del entorno live
        'app_id'            => '', // Este campo puede estar vacío
    ],

    'payment_action' => 'Sale', // Acción de pago (Sale, Authorization, Order)
    'currency'       => env('PAYPAL_CURRENCY', 'USD'), // Moneda utilizada para las transacciones
    'notify_url'     => '', // URL de notificación
    'locale'         => '', // Localización
    'validate_ssl'   => true, // Validación SSL
];
