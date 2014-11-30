<?php
return [
    /**
     * Service providers, witch loads on application booting
     */
    'serviceProviders' => [
        "App\\Support\\Http\\Routing\\RoutingServiceProvider",
        "App\\Support\\ServiceProviders\\ErrorsServiceProvider",
    ],


    /**
     * Templates configuration
     */
    'views' => [
        'driver' => 'flat',
        'templatePath' => 'resources/views/',
    ],

    /**
     * Data providers list
     */
    'dataProviders' => [
        'array',
        'json',
        'xml',
    ],
];