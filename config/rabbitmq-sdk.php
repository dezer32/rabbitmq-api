<?php

return [
    'protocol' => 'http',
    'host' => env('RABBITMQ_HOST', 'rabbitmq'),
    'port' => env('RABBITMQ_PORT_MANAGER', '15672'),
    'username' => env('RABBITMQ_USER', 'guest'),
    'password' => env('RABBITMQ_PASSWORD', 'guest'),
];