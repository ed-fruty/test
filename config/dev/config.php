<?php
return [
    'serviceProviders' => [
        "App\\Support\\Http\\Routing\\RoutingServiceProvider"
    ],


    'views' => [
        'driver' => 'flat',
        'templatePath' => 'resources/views/',
    ],

    'dataProviders' => [
        'array',
        'json',
        'xml',
    ],
];